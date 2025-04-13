<?php

namespace App\Http\Controllers;

use App\Models\ModelProduct;
use Illuminate\Http\Request;


class ProductDetailUserController extends Controller
{
    public function index($productId)
    {
        $products = ModelProduct::where('product_id', $productId)->with('product_detail')->get();
        // dd($products);
        return view('layouts.frontend.home.product', compact('products'));
    }
}
