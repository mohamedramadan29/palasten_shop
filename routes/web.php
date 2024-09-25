<?php

use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(FrontController::class)->group(function(){
    Route::get('/','index');
});

Route::controller(\App\Http\Controllers\front\ShopController::class)->group(function (){

    Route::get('shop','shop');

});

Route::controller(\App\Http\Controllers\front\ShopCollection::class)->group(function (){
   Route::get('collection','collection');
});

Route::controller(\App\Http\Controllers\front\ProductController::class)->group(function (){
   Route::get('product','product');
    Route::get('/search-products',  'search')->name('search.products');
});

Route::controller(\App\Http\Controllers\front\CartController::class)->group(function (){
   Route::get('cart','cart');
});

Route::controller(\App\Http\Controllers\front\CheckoutController::class)->group(function (){
   Route::get('checkout','checkout');
});

@include 'admin.php';
