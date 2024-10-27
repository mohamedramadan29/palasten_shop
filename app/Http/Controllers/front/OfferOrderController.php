<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Offer;
use App\Models\front\OfferOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OfferOrderController extends Controller
{
    use Message_Trait;

    public function store_offer(Request $request, $id)
    {
        try {
            $data = $request->all();
           // dd($data);
            $offer = Offer::findOrFail($id);
            $product_name = $offer['product_name'];
            $rules = [];
            $messages = [];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            $order = new OfferOrder();
            $order->create([
                'offer_id' => $id,
                'product_name' => $product_name,
                'name' => $data['name'],
                'phone' => $data['phone'],
                'city' => $data['shippingcity'],
                'address' => $data['address'],
                'ship_price' => $data['shipping_price'],
                'total_price' => $data['grand_total'],
            ]);

            return $this->success_message(' تمت اضافة الطلب الخاص بك بنجاح  ');

        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }
}
