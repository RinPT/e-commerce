<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {

        $currencies = Currencies::get();
        $categories = Categories::get();
        $items = Categories::tree();
        $products_in_cart = Wishlist::where('user_id', '=', auth()->user()->id)->get();
        $products = [];

        foreach($products_in_cart as $product_in_cart) {
            $products = Product::find($product_in_cart->product_id);
        }

        return view('cart', [
            'currencies' => $currencies,
            'categories'  => $categories,
            'items' => $items,
            'products' => $products,
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
