<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\ShippingCity;
use App\Models\front\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    use Message_Trait;

    public function cart()
    {
        $cartItems = Cart::getcartitems();
        $cartcount = $cartItems->count();
        $shippingCity = ShippingCity::where('status', 1)->get();
        return view('front.cart', compact('cartItems', 'cartcount', 'shippingCity'));
    }

    public function add(Request $request)
    {
        $cartData = $request->all();
        //  dd($cartData);
        // Generate Session Id If Not Exists
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = Session::getId();
            Session::put('session_id', $session_id);
            Session::regenerate(); // تأكد من تحديث الجلسة
        }

        //Check If This Product Already Exist Or Not
        if (Auth::check()) {
            // User Is Login
            $user_id = Auth::user()->id;
            $countProducts = Cart::where(['product_id' => $cartData['product_id'], 'user_id' => $user_id])->count();
        } else {
            // User Not Login
            $user_id = 0;
            $countProducts = Cart::where(['product_id' => $cartData['product_id'], 'session_id' => $session_id, 'product_variation_id' => $cartData['hidden-variation']])->count();
        }
        if ($countProducts > 0) {
            return response()->json(['message' => 'تم اضافة المنتج الي السلة من قبل ']);
        }
        // Save Product In Cart Tabel
        if (isset($cartData['discount']) && $cartData['discount'] > 0) {
            $price = $cartData['discount'];
        } else {
            $price = $cartData['price'];
        }
        if (isset($cartData['hidden-variation']) && $cartData['hidden-variation']) {
            $hidden_vartion = $cartData['hidden-variation'];
        } else {
            $hidden_vartion = null;
        }
        $item = new Cart();
        $item->session_id = $session_id;
        $item->user_id = $user_id;
        $item->product_id = $cartData['product_id'];
        $item->qty = $cartData['number'];
        $item->price = $price;
        $item->product_variation_id = $hidden_vartion;
        $item->save();
        $cartCount = Cart::getcartitems()->count();
        return response()->json([
            'message' => ' تم اضافه المنتج الي السله',
            'cartCount' => $cartCount // إرسال العدد إلى الـ Frontend
        ]);

        //return $this->success_message(' تم اضافه المنتج الي السله');
    }

//    public function getCartItems()
//    {
//        if (Auth::check()) {
//            $user_id = Auth::user()->id;
//            $cartItems = Cart::with('productdata')->where('user_id', $user_id)->get();
//        } else {
//            $session_id = Session::get('session_id');
//            $cartItems = Cart::with('productdata')->where('session_id', $session_id)->get();
//        }
//        // اعرض الـ view الخاص بعربة التسوق مع البيانات
//        return view('front.partials.cart_items', compact('cartItems'));
//    }

    public function getCartItems()
    {
        $cartItems = [];

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $cartItems = Cart::with('productdata')->where('user_id', $user_id)->get();
        } else {
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }
            $cartItems = Cart::with('productdata')->where('session_id', $session_id)->get();
        }

        // إرجاع البيانات المحدثة كـ JSON
        return response()->json([
            'html' => view('front.partials.cart_items', compact('cartItems'))->render(), // رندر الـ HTML
            'cartCount' => $cartItems->count(), // تحديث عداد السلة
        ]);
    }


    public function delete($id)
    {
        try {
            $item = Cart::findOrFail($id);
            $item->delete();
            return $this->success_message(' تم حذف المنتج من سلة المشتريات  ');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }

    public function updateCart(Request $request)
    {
        $cartItem = Cart::find($request->item_id); // إيجاد العنصر في السلة
        if ($cartItem) {
            $cartItem->qty = $request->quantity; // تحديث الكمية
            $cartItem->save(); // حفظ التحديثات

            // حساب المجموع للمنتج الواحد
            $itemTotal = $cartItem->qty * $cartItem->price;

            // حساب المجموع الفرعي (Subtotal)
            $subtotal = Cart::getcartitems()->sum(function ($item) {
                return $item['price'] * $item['qty'];
            });

            return response()->json([
                'itemTotal' => $itemTotal,
                'subtotal' => $subtotal
            ]);
        }

        return response()->json(['error' => 'Item not found'], 404);
    }


}
