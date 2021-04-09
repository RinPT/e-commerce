<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index() {

        $products = Product::get();

        return view('products', [
            'products' => $products,
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'product_name' => 'required|max:32',
            'product_description' => 'required',
            'price' => 'required|numeric',
            'cargo_price' => 'required|numeric'
        ]);

        $product = Product::create([
            'name' => $request->product_name,
            'description' => $request->product_description,
            'price' => $request->price,
            'cargo_price' => $request->cargo_price,
        ]);

        return back();
    }

    public function store() {
        $this->belongsTo(Store::class);
    }
}
