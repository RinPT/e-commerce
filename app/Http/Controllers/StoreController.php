<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Currencies;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke() {

        $currencies = Currencies::get();
        $products = Product::get();

        return view('store', [
            'products' => $products,
            'currencies' => $currencies
        ]);
    }

    public function products() {
        $this->hasMany(Product::class);
    }
}
