<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Attributes;
use App\Models\admin\AttributeValues;
use App\Models\admin\Brand;
use App\Models\admin\MainCategory;
use App\Models\admin\Product;
use App\Models\admin\ProductGallary;
use App\Models\admin\ProductVartions;
use App\Models\admin\SubCategory;
use App\Models\admin\VartionsValues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use Message_Trait;
    use Slug_Trait;
    use Upload_Images;

    public function index()
    {
        $products = Product::with('Main_Category')->orderBy('id', 'desc')->get();
        $MainCategories = MainCategory::where('status', '1')->get();
        $SubCategories = SubCategory::where('status', '1')->get();
        return view('admin.Products.index', compact('products', 'MainCategories', 'SubCategories'));
    }

    public function getAttributeValues($attributeId)
    {
        // جلب قيم المتغيرات بناءً على معرف السمة
        $values = AttributeValues::where('attribute_id', $attributeId)->get();
        // إعادة القيم كـ JSON
        return response()->json($values);
    }

    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('parent_id', $request->category_id)->pluck('name', 'id');
        if ($subCategories->isEmpty()) {
            return response()->json(['message' => 'لا يوجد أقسام فرعية داخل هذا القسم']);
        }
        return response()->json($subCategories);
    }

    public function store(Request $request)
    {
        $MainCategories = MainCategory::where('status', '1')->get();
        $SubCategories = SubCategory::where('status', '1')->get();
        $brands = Brand::where('status', '1')->get();
        $attributes = Attributes::all();
        $attributes_vartions = AttributeValues::all();
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'category_id' => 'required',
                    'description' => 'required'
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                // التحقق من الفيديو
                if ($request->hasFile('video')) {
                    $rules['video'] = 'mimes:mp4,mov,avi,flv|max:10240'; // 10MB
                }
                $messages = [
                    'name.required' => ' من فضلك ادخل اسم المنتج  ',
                    'category_id.required' => ' من فضلك حدد القسم الرئيسي للمنتج  ',
                    'description.required' => ' من فضلك ادخل الوصف الخاص بالمنتج ',
                    'image.mimes' =>
                    'من فضلك يجب ان يكون نوع الصورة jpg,png,jpeg,webp',
                    'image.image' => 'من فضلك ادخل الصورة بشكل صحيح',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/product_images'));
                }
                // حفظ الفيديو
                $video_name = null;
                if ($request->hasFile('video')) {
                    $video_file = $request->file('video');
                    $video_name = time() . '_' . $video_file->getClientOriginalName();
                    $video_file->move(public_path('assets/uploads/product_videos'), $video_name);
                }

                /////// Check if This Product In Db Or Not
                ///
                $count_old_product = Product::where('name', $data['name'])->count();
                if ($count_old_product > 0) {
                    return Redirect::back()->withInput()->withErrors(' اسم المنتج متواجد من قبل من فضلك ادخل منتج جديد  ');
                }
                DB::beginTransaction();
                $product = new Product();
                $product->name = $data['name'];
                if ($data['slug'] && $data['slug'] != '') {
                    $slug = $this->CustomeSlug($data['slug']);
                } else {
                    $slug = $this->CustomeSlug($data['name']);
                }
                $product->slug = $slug;
                $product->category_id = $data['category_id'];
                $product->sub_category_id = $data['sub_category_id'];
                $product->brand_id = $data['brand_id'];
                $product->status = $data['status'];
                $product->short_description = $data['short_description'];
                $product->description = $data['description'];
                $product->quantity = $data['quantity'];
                $product->type = $data['type'];
                $product->purches_price = $data['purches_price'];
                $product->price = $data['price'];
                $product->discount = $data['discount'];
                $product->meta_title = $data['meta_title'];
                $product->meta_keywords = $data['meta_keywords'];
                $product->meta_description = $data['meta_description'];
                $product->image = $file_name;
                $product->video = $video_name; // تخزين اسم الفيديو
                $product->save();
                ///////// Check If Product Gallary Not Empty
                ///
                if ($request->hasFile('gallery')) {
                    foreach ($request->file('gallery') as $gallery) { // تعديل `hasFile` إلى `file`
                        $gallery_name = $this->saveImage($gallery, 'assets/uploads/product_gallery');
                        $gallery_image = new ProductGallary(); // تأكد من استخدام اسم النموذج الصحيح
                        $gallery_image->product_id = $product->id;
                        $gallery_image->image = $gallery_name;
                        $gallery_image->save();
                    }
                }
                if ($data['type'] == 'متغير') {
                    // حفظ المتغيرات
                    foreach ($request->variant_name as $index => $variantName) {
                        // حفظ كل متغير في جدول product_variations
                        $productVariation = new ProductVartions();
                        $productVariation->product_id = $product->id;
                        $productVariation->price = $request->variant_price[$index];
                        $productVariation->discount = $request->variant_discount[$index];
                        $productVariation->image = $request->variant_image[$index]->store('images');
                        $productVariation->stock = $request->variant_stock[$index];
                        $productVariation->save();
                        // حفظ القيم المرتبطة بهذا المتغير
                        $attributes = explode(' - ', $variantName);
                        $attributesIds = $data['attributes'];  // مصفوفة attribute_ids
                        foreach ($attributes as $attributeIndex => $attributeName) {
                            if (isset($attributesIds[$attributeIndex])) {
                                VartionsValues::create([
                                    'product_variation_id' => $productVariation->id,
                                    'attribute_id' => $attributesIds[$attributeIndex], // ربط attribute_id بالقيمة الصحيحة
                                    'attribute_value_name' => $attributeName
                                ]);
                            }
                        }
                    }
                }
                DB::commit();
                return $this->success_message(' تم اضافة المنتج بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.Products.add', compact('MainCategories', 'SubCategories', 'brands', 'attributes', 'attributes_vartions'));
    }

    public function update(Request $request, $slug)
    {
        // جلب الفئات الرئيسية والفرعية والعلامات التجارية والسمات
        $MainCategories = MainCategory::where('status', '1')->get();
        $SubCategories = SubCategory::where('status', '1')->get();
        $brands = Brand::where('status', '1')->get();
        $attributes = Attributes::all();

        // جلب المنتج مع الفئة الفرعية والمتغيرات المرتبطة به
        $product = Product::with('Sub_Category')->where('slug', $slug)->first();
        $variations = ProductVartions::where('product_id', $product['id'])->get();
        $gallaries = ProductGallary::where('product_id', $product->id)->get();


        if ($request->isMethod('post')) {
            // التحقق من صحة المدخلات
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|integer',
                'sub_category_id' => 'nullable|integer',
                'type' => 'required|in:بسيط,متغير',
            ]);
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                ////// Delete Old Image
                $old_image = public_path('assets/uploads/product_images/' . $product->image);
                if (file_exists($old_image)) {
                    @unlink($old_image);
                }
                $file_name = $this->saveImage($request->image, public_path('assets/uploads/product_images'));

                $product->update([
                    'image' => $file_name
                ]);
            }
            try {
                $data = $request->all();
                //dd($data);
                // البحث عن المنتج للتعديل
                // $product = Product::find();  // استبدال $productId بالمعرّف الخاص بالمنتج

                // تحديث معلومات المنتج
                $product->name = $data['name'];
                if ($data['slug'] && $data['slug'] != '') {
                    $slug = $this->CustomeSlug($data['slug']);
                } else {
                    $slug = $this->CustomeSlug($data['name']);
                }
                $product->slug = $slug;
                $product->category_id = $data['category_id'];
                $product->sub_category_id = $data['sub_category_id'];
                $product->brand_id = $data['brand_id'];
                $product->status = $data['status'];
                $product->short_description = $data['short_description'];
                $product->description = $data['description'];
                $product->quantity = $data['quantity'];
                $product->type = $data['type'];
                $product->purches_price = $data['purches_price'];
                $product->price = $data['price'];
                $product->discount = $data['discount'];
                $product->meta_title = $data['meta_title'];
                $product->meta_keywords = $data['meta_keywords'];
                $product->meta_description = $data['meta_description'];



                $product->save();

                ///////// تحديث معرض الصور إذا كان موجودًا
                if ($request->hasFile('gallery')) {
                    foreach ($request->file('gallery') as $gallery) {
                        $gallery_name = $this->saveImage($gallery, 'assets/uploads/product_gallery');
                        $gallery_image = new ProductGallary();
                        $gallery_image->product_id = $product->id;
                        $gallery_image->image = $gallery_name;
                        $gallery_image->save();
                    }
                }


                // التحقق من نوع المنتج "متغير"
                if ($data['type'] == 'متغير') {
                    // تعديل أو إضافة المتغيرات
                    if (isset($request->variant_new_name) && $request->variant_new_name != null) {

                        // dd('new_vartions');
                        // حذف جميع المتغيرات القديمة

                        $variations = ProductVartions::where('product_id', $product->id)->get();
                        foreach ($variations as $variation) {
                            $variation->delete();
                        }
                        // حفظ المتغيرات الجديدة
                        foreach ($request->variant_new_name as $index => $variantName) {

                            // حفظ كل متغير في جدول product_variations
                            // حفظ كل متغير في جدول product_variations باستخدام create
                            //dd($request->variant_name);
                            $productVariation = ProductVartions::create([
                                'product_id' => $product->id,
                                'price' => $request->variant_new_price[$index],
                                'discount' => $request->variant_new_discount[$index],
                                //  'image' => $request->variant_new_image[$index]->store('images'),
                                'stock' => $request->variant_new_stock[$index],
                            ]);

                            // حفظ القيم المرتبطة بهذا المتغير

                            $attributes = explode(' - ', $variantName);

                            $attributesIds = $data['attributes'];  // مصفوفة attribute_ids
                            //    dd($attributesIds);
                            foreach ($attributes as $attributeIndex => $attributeName) {
                                if (isset($attributesIds[$attributeIndex])) {
                                    VartionsValues::create([
                                        'product_variation_id' => $productVariation->id,
                                        'attribute_id' => $attributesIds[$attributeIndex], // ربط attribute_id بالقيمة الصحيحة
                                        'attribute_value_name' => $attributeName
                                    ]);
                                }
                            }
                        }
                    } else {
                        foreach ($request->variant_id as $index => $variantId) {
                            if ($variantId) {
                                // تعديل المتغير الموجود
                                $productVariation = ProductVartions::find($variantId);
                            } else {
                                // إنشاء متغير جديد
                                $productVariation = new ProductVartions();
                                $productVariation->product_id = $product->id;
                            }

                            // تحديث بيانات المتغير
                            $productVariation->price = $request->variant_price[$index];
                            $productVariation->discount = $request->variant_discount[$index];

                            if (isset($request->variant_image[$index])) {
                                $productVariation->image = $request->variant_image[$index]->store('images');
                            }

                            $productVariation->stock = $request->variant_stock[$index];
                            $productVariation->save();

                            // تحديث القيم المرتبطة بالمتغير
                            foreach ($request->variant_attributes[$index] as $attributeId => $attributeValue) {
                                VartionsValues::updateOrCreate(
                                    [
                                        'product_variation_id' => $productVariation->id,
                                        'attribute_id' => $attributeId,
                                    ],
                                    [
                                        'attribute_value_name' => $attributeValue,
                                    ]
                                );
                            }
                        }
                    }
                }
                DB::commit();
                // بعد تحديث المنتج بنجاح
                return Redirect::route('product.update', ['slug' => $product->slug])
                    ->with('Success_message', 'تم تعديل المنتج بنجاح');
            } catch (\Exception $e) {
                DB::rollback();
                return $this->error_message('حدث خطأ أثناء عملية التعديل.');
            }
        }
        // عرض صفحة التعديل
        return view('admin.Products.update', compact('product', 'MainCategories', 'SubCategories', 'brands', 'attributes', 'gallaries', 'variations'));
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return $this->success_message(' تم حذف المنتج بنجاح  ');
    }

    public function delete_image_gallary($id)
    {
        $imageGallary = ProductGallary::findOrFail($id);
        $oldimage = public_path('assets/uploads/product_gallery/' . $imageGallary['image']);
        if (file_exists($oldimage)) {
            @unlink($oldimage);
        }
        $imageGallary->delete();
        return $this->success_message(' تم حذف الصورة بنجاح  ');
    }
}
