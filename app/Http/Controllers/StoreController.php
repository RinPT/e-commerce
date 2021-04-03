<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke() {
        $products = Product::get();

        return view('store', [
            'products' => $products
        ]);
    }
}
