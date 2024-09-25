<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use App\Models\admin\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $banners = Banner::where('status',1)->get();
        $bestproducts  = Product::with('gallary')->where('status',1)->get();
        return view('front.index',compact('banners','bestproducts'));
    }

}
