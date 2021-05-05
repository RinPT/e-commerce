<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Currencies;
use App\Models\Categories;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {

        $currencies = Currencies::get();
        $products = Product::get();
        $categories = Categories::get();
        $items = Categories::tree();

        return view('store', [
            'products' => $products,
            'currencies' => $currencies,
            'categories'  => $categories,
            'items' => $items,

        ]);
    }

    public function products() {
        $this->hasMany(Product::class);
    }
}
