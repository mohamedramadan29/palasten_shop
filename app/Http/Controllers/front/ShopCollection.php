<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopCollection extends Controller
{
    public function collection()
    {
        return view('front.collection');
    }
}
