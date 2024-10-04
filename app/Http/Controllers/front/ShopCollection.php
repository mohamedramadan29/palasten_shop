<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\MainCategory;
use Illuminate\Http\Request;

class ShopCollection extends Controller
{
    public function collection()
    {

        $categories = MainCategory::where('status',1)->paginate(6);

        return view('front.collection',compact('categories'));
    }
}
