<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\StoreDiscount;
use App\Http\Controllers\Controller;

class StoreDiscountController extends Controller
{
    public function index() {

        $discounts = StoreDiscount::get();

        return view('admin.discounts.store.index', [
            'discounts' => $discounts,
        ]);
    }

    public function create() {

        $stores = Store::get();

        return view('admin.discounts.store.create', [
            'stores' => $stores,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'store_id' => 'required|unique:store_discount,store_id',
            'store_discount' => 'numeric',
            'main_discount' => 'required|numeric',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            'store_id.unique' => 'Discount for this store is already exists in the system!'
        ]);

        StoreDiscount::create([
            'store_id' => $request->store_id,
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

        StoreDiscount::find($discount_id)->update([
            'store_discount' => $request->store_discount,
            'main_discount' => $request->main_discount,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return back()->with("status", "Store Discount has been updated!");
    }

    public function destroy($discount_id) {
        StoreDiscount::find($discount_id)->delete();
        return back()->with("destroy", "Discount removed from the product!");
    }
}
