<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Product;
use App\Models\front\Cart;
use App\Models\front\Order;
use App\Models\front\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use Message_Trait;

    public function store(Request $request)
    {
        $data = $request->all();
        $cartItems = Cart::getcartitems();
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'shippingcity' => 'required',
            'address' => 'required',
        ];
        $messages = [
            'name.required' => ' من فضلك ادخل الاسم  ',
            'phone.required' => ' من فضلك ادخل رقم الهاتف  ',
            'email.required' => ' من فضلك ادخل رقم الهاتف  ',
            'shippingcity.required' => ' من فضلك حدد المدينة للشحن  ',
            'address.required' => ' من فضلك حدد العنوان  '
        ];

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        DB::beginTransaction();
        $order = new Order();
        $order->name = $data['name'] . '' . $data['name2'];
        $order->address = $data['address'];
        $order->shippingcity = $data['shippingcity'];
        $order->phone = $data['phone'];
        $order->phone2 = $data['phone2'];
        $order->email = $data['email'];
        $order->shipping_price = $data['shipping_price'];
        $order->order_status = 'لم يبدا';
        $order->payment_method = 'الدفع عند الاستلام';
        $order->grand_total = $data['grand_total'];
        $order->save();
        foreach ($cartItems as $item) {
            $order_details = new OrderDetails();
            $order_details->order_id = $order->id;
            $order_details->product_id = $item['product_id'];
            $getproductdata = Product::where('id', $item['product_id'])->first();
            $order_details->product_name = $getproductdata['name'];
            $order_details->product_price = $item['price'];
            $order_details->product_qty = $item['qty'];
            $order_details->product_variation_id = $item['product_variation_id'];
            $order_details->save();
        }
        DB::commit();
        Session::put('order_id', $order->id);
        return redirect('thanks');
       // return $this->success_message(' تم اضافة الطلب الخاص بك بنجاح  ');
    }

    public function thanks()
    {
        $session_id = Session::get('session_id');
        if (Session::has('order_id')) {
            // Empty The Cart
            Cart::where('session_id',$session_id)->delete();
            return view('front.thanks');
        } else {
            return redirect('/');
        }
    }
}
