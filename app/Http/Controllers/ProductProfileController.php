<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Currencies;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductProfileController extends Controller
{
    public function __invoke(Product $product) {

        $currencies = Currencies::get();
        $categories = Categories::get();
        $items = Categories::tree();

        return view('product_profile', [
            'product' => $product,
            'currencies' => $currencies,
            'categories'  => $categories,
            'items' => $items,
        ]);
    }
}
