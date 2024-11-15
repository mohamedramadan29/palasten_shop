<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getProducts()
    {

        $query = Product::query();
        $allproducts = $query->get();
        $latest_products = $query->latest()->take(6)->get();
        return response()->json($latest_products);
    }
}
