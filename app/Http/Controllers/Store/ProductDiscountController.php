<?php

namespace App\Http\Controllers\Store;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductDiscount;
use App\Http\Controllers\Controller;

class ProductDiscountController extends Controller
{
    private $logged_author;

    public function __construct() {
        $this->logged_author = app('App\Http\Controllers\GlobalController')->index();
    }

    public function index() {

        $products = Product::where('store_id', '=', $this->logged_author->id)->get();

        foreach($products as $product) {
            $discounts = ProductDiscount::where('product_id', '=', $product->id)->get();
        };

        return view('store.discounts.product.index', [
            'discounts' => $discounts,
        ]);
    }

    public function create() {

        $products = Product::where('store_id', '=', $this->logged_author->id)->get();

        return view('store.discounts.product.create', [
            'products' => $products,
        ]);
    }



    public function store(Request $request) {

        $discount = ProductDiscount::find($this->logged_author->id);
        if($discount !== null){
            return back()->with("error", "Discount for this store is already exists in the system!");
        }

        $this->validate($request, [
            'product_id' => 'required',
            'store_discount' => 'required|numeric',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        ProductDiscount::create([
            'product_id' => $request->product_id,
            'store_discount' => $request->store_discount,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return back()->with("status", "Discount added to the product successfully.");
    }

    public function update(Request $request, $discount_id) {
        $this->validate($request, [
            'store_discount' => 'numeric',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        ProductDiscount::find($discount_id)->update([
            'store_discount' => $request->store_discount,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return back()->with("status", "Product Discount has been updated!");
    }

    public function destroy($discount_id) {
        ProductDiscount::find($discount_id)->delete();
        return back()->with("destroy", "Discount removed from the product!");
    }
}
