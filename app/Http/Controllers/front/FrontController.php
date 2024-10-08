<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use App\Models\admin\MainCategory;
use App\Models\admin\Product;
use App\Models\admin\ProductVartions;
use App\Models\admin\VartionsValues;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $banners = Banner::where('status',1)->get();
        $bestproducts  = Product::with('gallary','Main_Category')->where('status',1)->get();
        $lastproducts = Product::with('gallary','Main_Category')->where('status',1)->orderBy('id','DESC')->limit(12)->get();
        $mainCategories = MainCategory::where('status',1)->get();
        // جلب الأقسام المحددة لتظهر في الصفحة الرئيسية
        $selectedCategories = MainCategory::where('main_page', 1)->get();

        // جلب المنتجات المتعلقة بالأقسام المختارة
        $productsBySelectedCategories = Product::with('gallary', 'Main_Category')
            ->whereHas('Main_Category', function ($query) {
                $query->where('main_page', 1);
            })
            ->where('status', 1)
            ->get();

        return view('front.index',compact('banners','bestproducts','lastproducts','mainCategories','selectedCategories','productsBySelectedCategories'));
    }

    public function getProductDetails($id){

        // جلب جميع المتغيرات الخاصة بالمنتج
        $productVariations = ProductVartions::where('product_id', $id)->get();

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
    }
}
