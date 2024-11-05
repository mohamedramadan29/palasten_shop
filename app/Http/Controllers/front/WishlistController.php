<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Product;
use App\Models\front\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $cookie_id = Cookie::get('cookie_id');

// جلب جميع العناصر في المفضلة حسب cookie_id
        $wishlists = Wishlist::where('cookie_id', $cookie_id)->get();

// جلب المنتجات المرتبطة بالمفضلة
        $wishlistProductIds = $wishlists->pluck('product_id')->toArray();

// جلب المنتجات من جدول products بناءً على IDs
        $productsInWishlist = Product::whereIn('id', $wishlistProductIds)->get();
        return view('front.wishlist', compact('wishlists', 'productsInWishlist'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $cookie_id = Cookie::get('cookie_id');
        if (empty($cookie_id)) {
            $cookie_id = Session::getId();
            // تخزين session_id في cookie لمدة 30 يومًا
            Cookie::queue(Cookie::make('session_id', $cookie_id, 60 * 24 * 30));
        }
        if (!empty($cookie_id)) {
            $wishlist = wishlist::where('cookie_id', $cookie_id)->where('product_id', $data['product_id'])->first();
            if (!$wishlist) {
                wishlist::create([
                    'cookie_id' => $cookie_id,
                    'product_id' => $data['product_id'],
                ]);
                // حساب عدد المنتجات في المفضلة
                $wishlistCount = Wishlist::where('cookie_id', $cookie_id)->count();
                return response()->json([
                    'message' => 'تم إضافة المنتج إلى المفضلة بنجاح!',
                    'wishlistCount' => $wishlistCount // إرسال العدد إلى الـ Frontend
                ]);
            } else {
                return response()->json(['message' => 'تم اضافة المنتج الي المفضلة من قبل ']);
                // return $this->success_message(' تم اضافة المنتج الي المفضلة من قبل  ');
            }
        }
    }

    public function delete($id)
    {
        try {
            $cookie_id = Cookie::get('cookie_id');
            if (empty($cookie_id)) {
                $cookie_id = Session::getId();
                // تخزين session_id في cookie لمدة 30 يومًا
                Cookie::queue(Cookie::make('session_id', $cookie_id, 60 * 24 * 30));
            }
            $wishlist = wishlist::where('product_id', $id)->where('cookie_id', $cookie_id)->first();
            $wishlist->delete();
            return $this->success_message(' تم حذف المنتج من المفضلة بنجاح  ');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }
}
