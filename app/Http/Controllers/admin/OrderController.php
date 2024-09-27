<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
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

}
