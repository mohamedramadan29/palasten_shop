<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\AdminController;
use \App\Http\Controllers\admin\MainCategoryController;
use \App\Http\Controllers\admin\SubCategoryController;
use \App\Http\Controllers\admin\BrandController;
use \App\Http\Controllers\admin\SocialMediaController;
use \App\Http\Controllers\admin\PublicSettingController;
use \App\Http\Controllers\admin\AttributesController;
use \App\Http\Controllers\admin\AttributeValuesController;
use \App\Http\Controllers\admin\ProductController;
use \App\Http\Controllers\admin\CouponController;
use \App\Http\Controllers\admin\TopNavBarController;
use \App\Http\Controllers\admin\ShippingCityController;
use \App\Http\Controllers\admin\FaqController;

Route::group(['prefix' => 'admin'], function () {
// Admin Login

    Route::controller(AdminController::class)->group(function () {
        Route::match(['post', 'get'], '/', 'login')->name('admin_login');
        Route::match(['post', 'get'], 'login', 'login')->name('admin_login');
// Admin Dashboard
        Route::group(['middleware' => 'admin'], function () {
            Route::get('dashboard', 'dashboard');
// update admin password
            Route::match(['post', 'get'], 'update_admin_password', 'update_admin_password');
// check Admin Password
            Route::post('check_admin_password', 'check_admin_password');
// Update Admin Details
            Route::match(['post', 'get'], 'update_admin_details', 'update_admin_details');
            Route::get('logout', 'logout')->name('logout');
        });
    });
    Route::group(['middleware' => 'admin'], function () {
        ///////////// Start Main Categories
        Route::controller(MainCategoryController::class)->group(function () {
            Route::get('main-categories', 'index');
            Route::match(['post', 'get'], 'main-category/add', 'store');
            Route::match(['post', 'get'], 'main-category/update/{id}', 'update');
            Route::post('main-category/delete/{id}', 'delete');
        });

        ///////////////////// Start Sub Categories

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('sub-categories/{id}', 'index');
            Route::match(['post', 'get'], 'sub-category/add/{id}', 'store');
            Route::match(['post', 'get'], 'sub-category/update/{id}', 'update');
            Route::post('sub-category/delete/{id}', 'delete');
        });

        /////////// Start Brands

        Route::controller(BrandController::class)->group(function () {
            Route::get('brands', 'index');
            Route::match(['post', 'get'], 'brand/add', 'store');
            Route::match(['post', 'get'], 'brand/update/{id}', 'update');
            Route::post('brand/delete/{id}', 'delete');
        });

        ///////////////// Start Public Settings
        ///

        Route::controller(PublicSettingController::class)->group(function () {
            Route::match(['post', 'get'], 'public-setting/update', 'update');
        });

        //////////// Start Social Media
        ///
        Route::controller(SocialMediaController::class)->group(function () {
            Route::match(['post', 'get'], 'social-media/update', 'update');
        });

        ///////////////// Start Product Attribute /////////////////////////
        Route::controller(AttributesController::class)->group(function () {
            Route::get('attributes', 'index');
            Route::match(['post', 'get'], 'attribute/add', 'store');
            Route::match(['post', 'get'], 'attribute/update/{id}', 'update');
            Route::post('attribute/delete/{id}', 'delete');
        });
        ///////////////////// start Attribute Values /////////////////
        Route::controller(AttributeValuesController::class)->group(function () {
            Route::get('attribute-values/{id}', 'index');
            Route::match(['post', 'get'], 'attribute-value/add/{id}', 'store');
            Route::match(['post', 'get'], 'attribute-value/update/{id}', 'update');
            Route::post('attribute-value/delete/{id}', 'delete');
        });

        ////////////////////// Start Products ///////////////////////////////
        Route::controller(ProductController::class)->group(function () {
            Route::get('products', 'index');
            Route::match(['post', 'get'], 'product/add', 'store');
            Route::match(['post', 'get'], 'product/update/{slug}', 'update');
            Route::post('product/delete/{id}', 'delete');
            Route::get('/get-attribute-values/{attributeId}', 'getAttributeValues');
            Route::get('/get-subcategories', 'getSubCategories')->name('get.subcategories');
            Route::post('product/gallary/delete/{id}', 'delete_image_gallary');
        });

        //////////////////////////// Start Coupon Code ////////////////////
        ///
        Route::controller(CouponController::class)->group(function () {
            Route::get('coupons', 'index');
            Route::match(['post', 'get'], 'coupon/add', 'store');
            Route::match(['post', 'get'], 'coupon/update/{id}', 'update');
            Route::post('coupon/delete/{id}', 'delete');
        });
        //////////////// Start Faq Controller ////////////////////
        ///
        Route::controller(FaqController::class)->group(function () {
            Route::get('faqs', 'index');
            Route::match(['post', 'get'], 'faq/add', 'store');
            Route::match(['post', 'get'], 'faq/update/{id}', 'update');
            Route::post('faq/delete/{id}', 'delete');
        });
        /////////////////////// Start Shipping City /////////
        ///
        Route::controller(ShippingCityController::class)->group(function () {
            Route::get('shipping-city', 'index');
            Route::post('city/add', 'store');
            Route::post('city/update/{id}', 'update');
            Route::post('city/delete/{id}', 'delete');
        });

        /////////////////// Start top Navbar settings //////////////
        ///
        Route::controller(TopNavBarController::class)->group(function () {

            Route::get('top-navbar', 'index');
            Route::post('top-navbar/add', 'store');
            Route::post('top-navbar/update/{id}', 'update');
            Route::post('top-navbar/delete/{id}', 'delete');
        });
    });
});
