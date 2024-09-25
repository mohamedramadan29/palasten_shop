<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        return view('front.product-details');
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
}
