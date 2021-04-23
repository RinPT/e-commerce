<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Currencies;
use Illuminate\Http\Request;

class ProductProfileController extends Controller
{
    public function __invoke(Product $product) {

        $currencies = Currencies::get();

        return view('product_profile', [
            'product' => $product,
            'currencies' => $currencies
        ]);
    }
}
