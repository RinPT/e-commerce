<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductProfileController extends Controller
{
    public function __invoke(Product $product) {
        return view('product_profile', [
            'product' => $product
        ]);
    }
}
