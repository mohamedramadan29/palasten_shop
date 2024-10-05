<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::where('status',1)->paginate(16);
        return view('front.shop',compact('products'));
    }
}
