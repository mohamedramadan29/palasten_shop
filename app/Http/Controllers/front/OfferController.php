<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\ShippingCity;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    use Message_Trait;

    public function offer()
    {
        $shippingCity = ShippingCity::all();
        return view('front.offer',compact('shippingCity'));
    }
}
