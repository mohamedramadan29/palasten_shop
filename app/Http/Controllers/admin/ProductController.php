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
use App\Models\admin\ProductVartions;
use App\Models\admin\SubCategory;
use App\Models\admin\VartionsValues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use Message_Trait;
    use Slug_Trait;
    use Upload_Images;

    public function index()
    {
        $products = Product::all();
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
                $rules = [];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [
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
                $product->price = $data['price'];
                $product->discount = $data['discount'];
                $product->meta_title = $data['meta_title'];
                $product->meta_keywords = $data['meta_keywords'];
                $product->meta_description = $data['meta_description'];
                $product->image = $file_name;
                $product->save();
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
                return $this->success_message(' تم اضافة المنتج بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.products.add', compact('MainCategories', 'SubCategories', 'brands', 'attributes', 'attributes_vartions'));

    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);


        return view('admin.Products.update', compact('product'));
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return $this->success_message(' تم حذف المنتج بنجاح  ');
    }
}
