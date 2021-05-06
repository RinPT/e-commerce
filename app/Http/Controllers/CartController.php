<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\Categories;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {

        $currencies = Currencies::get();
        $categories = Categories::get();
        $items = Categories::tree();

        return view('cart', [
            'currencies' => $currencies,
            'categories'  => $categories,
            'items' => $items,
        ]);
    }

    public function store($product_id) {
        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product_id,
        ]);

        return back()->with('success', 'Item added to your cart!');
    }
}
