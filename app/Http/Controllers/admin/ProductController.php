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
        $products = Product::with('Main_Category')->orderBy('id','desc')->get();
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
                /////// Check if This Product In Db Or Not
                ///
                $count_old_product = Product::where('name', $data['name'])->count();
                if ($count_old_product > 0) {
                    return Redirect::back()->withInput()->withErrors(' اسم المنتج متواجد من قبل من فضلك ادخل منتج جديد  ');
                }
                DB::beginTransaction();
                $product = new Product();
                $product->name = $data['name'];
                $product->slug = $this->CustomeSlug($data['name']);
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
        return view('admin.products.add', compact('MainCategories', 'SubCategories', 'brands', 'attributes', 'attributes_vartions'));

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
        $variations  = ProductVartions::where('product_id',$product['id'])->get();
        $gallaries = ProductGallary::where('product_id', $product->id)->get();

        if ($request->isMethod('post')) {
            // التحقق من صحة المدخلات
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|integer',
                'sub_category_id' => 'nullable|integer',
                'type' => 'required|in:بسيط,متغير',
            ]);

            try {
                $data = $request->all();

                // تحديث بيانات المنتج
                $product->update([
                    'name' => $data['name'],
                    'category_id' => $data['category_id'],
                    'sub_category_id' => $data['sub_category_id'],
                    'type' => $data['type'],
                ]);

                // التعامل مع المتغيرات
                if ($data['type'] == 'متغير') {
                    // حذف المتغيرات الحالية المرتبطة بالمنتج
                    ProductVariation::where('product_id', $product->id)->delete();

                    if (isset($data['variant_price']) && is_array($data['variant_price'])) {
                        foreach ($data['variant_price'] as $index => $price) {
                            // إنشاء متغير جديد
                            $productVariation = ProductVariation::create([
                                'product_id' => $product->id,
                                'price' => $price,
                                'discount' => $data['variant_discount'][$index] ?? 0,
                                'stock' => $data['variant_stock'][$index] ?? 0,
                                'image' => isset($data['variant_image'][$index]) ? $this->uploadImage($data['variant_image'][$index]) : null,
                            ]);

                            // إضافة قيم السمات للمتغير
                            foreach ($data['variant_attributes'][$index] as $attribute_id => $attribute_value_name) {
                                VariationValue::create([
                                    'product_variation_id' => $productVariation->id,
                                    'attribute_id' => $attribute_id,
                                    'attribute_value_name' => $attribute_value_name,
                                ]);
                            }
                        }
                    }
                }

                // تحديث الجاليري
                if ($request->hasFile('gallary_images')) {
                    foreach ($request->file('gallary_images') as $file) {
                        $filePath = $this->uploadImage($file);
                        ProductGallary::create([
                            'product_id' => $product->id,
                            'image' => $filePath,
                        ]);
                    }
                }

                return redirect()->back()->with('success', 'تم تحديث المنتج بنجاح');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        // عرض صفحة التعديل
        return view('admin.Products.update', compact('product', 'MainCategories', 'SubCategories', 'brands', 'attributes', 'gallaries','variations'));
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
        $oldimage = public_path('assets/uploads/product_gallery/'.$imageGallary['image']);
        if (file_exists($oldimage)){
            unlink($oldimage);
        }
        $imageGallary->delete();
        return $this->success_message(' تم حذف الصورة بنجاح  ');
    }
}
