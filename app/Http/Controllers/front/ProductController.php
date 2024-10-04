<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use App\Models\admin\ProductVartions;
use App\Models\admin\VartionsValues;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product($slug)
    {

        $product = Product::with('Main_Category', 'gallary')->where('slug', $slug)->first();


        // جلب جميع المتغيرات الخاصة بالمنتج
        $productVariations = ProductVartions::where('product_id', $product->id)->get();

        // جمع السمات مع القيم بناءً على attribute_id
        $variationAttributes = [];

        foreach ($productVariations as $variation) {
            // جلب القيم من جدول vartions_values بناءً على المتغير
            $attributes = VartionsValues::where('product_variation_id', $variation->id)->get();

            foreach ($attributes as $attribute) {
                // التأكد من أن العلاقة مع attributes تجلب الاسم
                $attributeName = $attribute->attribute->name;
                // تنظيم القيم حسب attribute_id
                if (!isset($variationAttributes[$attribute->attribute_id])) {
                    $variationAttributes[$attribute->attribute_id] = [
                        'name' => $attributeName, // اسم السمة من جدول attributes
                        'values' => []
                    ];
                }
                // إضافة القيم إلى السمة المحددة إذا لم تكن موجودة مسبقاً
                if (!in_array($attribute->attribute_value_name, $variationAttributes[$attribute->attribute_id]['values'])) {
                    $variationAttributes[$attribute->attribute_id]['values'][] = $attribute->attribute_value_name;
                }
            }
        }

        return view('front.product-details', compact('product', 'productVariations', 'variationAttributes'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $query = $request->input('query');
        $category = $request->input('category');
        $products = Product::where('name', 'LIKE', "%{$query}%")->select('name', 'slug');

        if ($category) {
            $products->where('category_id', $category);
        }
        $results = $products->get();
        // إرجاع النتائج كـ HTML (قائمة منسدلة)
        $output = '';
        if ($results->count() > 0) {
            foreach ($results as $product) {
                $output .= "<a href='/product/{$product->slug}' class='dropdown-item'>{$product->name}</a>";
            }
        } else {
            $output = '<p class="dropdown-item">لا توجد نتائج</p>';
        }

        return response()->json($output);

    }

    public function getPrice(Request $request, $productId)
    {
        // جلب جميع المتغيرات الخاصة بالمنتج
        $productVariations = ProductVartions::where('product_id', $productId)->get();

        // جلب قيم السمات من الطلب
        $selectedAttributes = $request->attribute_values;

        // البحث عن المتغير الذي يحتوي على نفس القيم
        foreach ($productVariations as $variation) {
            $matched = true;
            $variationAttributes = VartionsValues::where('product_variation_id', $variation->id)->get();

            // تحقق من مطابقة القيم
            foreach ($variationAttributes as $attribute) {
                if (!isset($selectedAttributes[$attribute->attribute_id]) || $selectedAttributes[$attribute->attribute_id] !== $attribute->attribute_value_name) {
                    $matched = false;
                    break;
                }
            }
            // إذا كانت القيم متطابقة، نعيد السعر والتخفيض إذا وجد

            if ($matched) {
                return response()->json([
                    'variation_id'=>$variation->id,
                    'price' => $variation->price,
                    'discount' => $variation->discount > 0 ? $variation->discount : null
                ]);
            }
        }

        // إذا لم يتم العثور على متغير مطابق
        return response()->json(['price' => null, 'discount' => null]);
    }

    public function quickView($id)
    {
        $product = Product::findOrFail($id);
        return view('front.partials.quick-view', compact('product'));
    }




}
