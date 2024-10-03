<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\PublicSetting;
use App\Models\front\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use Message_Trait;
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index',compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::with('details','city')->where('id',$id)->first();
        if ($request->isMethod('post')){
            try {
                $data = $request->all();
                $order->update([
                    'order_status'=>$data['order_status']
                ]);
                return $this->success_message(' تم تعديل حالة الطلب بنجاح  ');
            }catch (\Exception $e){
                return $this->exception_message($e);
            }
        }

        return view('admin.orders.update',compact('order'));
    }

    public function print($id)
    {
        $order = Order::with('details','city')->where('id',$id)->first();
        $publicsetting = PublicSetting::first();
        return view('admin.orders.print',compact('order','publicsetting'));
    }

}
