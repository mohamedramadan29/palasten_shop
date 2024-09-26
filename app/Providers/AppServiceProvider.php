<?php

namespace App\Providers;

use App\Models\admin\PublicSetting;
use App\Models\front\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('public_settings')) {
            $settings = PublicSetting::first();
            $currency = $settings['website_currency'];

            // مشاركة العملة مع جميع الفيوهات (Blade templates)
            View::share('storeCurrency', $currency);
        }

        // التأكد من وجود session_id
        View::composer('*', function ($view) {
            $cartItems = [];

            if (Auth::check()) {
                // إذا كان المستخدم مسجل الدخول
                $user_id = Auth::user()->id;
                $cartItems = Cart::with('productdata')->where('user_id', $user_id)->get();
            } else {
                // التحقق أو إنشاء session_id
                $session_id = Session::get('session_id');

                //dd($session_id);
                if (empty($session_id)) {
                    // إذا لم يكن هناك session_id، نعينه
                    $session_id = Session::getId(); // إنشاء session_id جديد إذا لم يكن موجود
                    Session::put('session_id', $session_id);
                }

                // الحصول على المنتجات من السلة بناءً على session_id
                $cartItems = Cart::with('productdata')->where('session_id', $session_id)->get();
               // dd($cartItems);
            }
            // مشاركة عناصر السلة مع جميع الفيوهات
            //$view->with('cartItems', $cartItems);
            View::share('cartItems', $cartItems);
        });
    }
}
