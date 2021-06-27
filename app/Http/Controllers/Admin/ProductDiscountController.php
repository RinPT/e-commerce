<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductDiscount;
use App\Http\Controllers\Controller;

class ProductDiscountController extends Controller
{
    public function index() {

        $discounts = ProductDiscount::get();

        return view('admin.discounts.product.index', [
            'discounts' => $discounts,
        ]);
    }

    public function create() {

        $products = Product::get();

        return view('admin.discounts.product.create', [
            'products' => $products,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'product_id' => 'required|unique:product_discount,product_id',
            'store_discount' => 'numeric',
            'main_discount' => 'required|numeric',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            'product_id.unique' => 'Discount for this store is already exists in the system!'
        ]);

        ProductDiscount::create([
            'product_id' => $request->product_id,
            'store_discount' => $request->store_discount,
            'main_discount' => $request->main_discount,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return back()->with("status", "Discount added to the product successfully.");
    }

    public function update(Request $request, $discount_id) {
        $this->validate($request, [
            'store_discount' => 'numeric',
            'main_discount' => 'required|numeric',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        ProductDiscount::find($discount_id)->update([
            'store_discount' => $request->store_discount,
            'main_discount' => $request->main_discount,
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
