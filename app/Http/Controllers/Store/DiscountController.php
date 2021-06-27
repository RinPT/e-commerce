<?php

namespace App\Http\Controllers\Store;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\StoreDiscount;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{

    private $logged_author;

    public function __construct() {
        $this->logged_author = app('App\Http\Controllers\GlobalController')->index();
    }

    public function index() {

        $discounts = StoreDiscount::where('store_id', '=', $this->logged_author->id)->get();

        return view('store.discounts.store.index', [
            'discounts' => $discounts,
        ]);
    }

    public function create() {
        $stores = Store::find($this->logged_author)->first();

        return view('store.discounts.store.create', [
            'stores' => $stores,
        ]);
    }

    public function store(Request $request) {

        $discount = StoreDiscount::find($this->logged_author->id);
        if($discount !== null){
            return back()->with("error", "Discount for this store is already exists in the system!");
        }

        $this->validate($request, [
            'store_discount' => 'numeric',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        StoreDiscount::create([
            'store_id' => $this->logged_author->id,
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

        StoreDiscount::find($discount_id)->update([
            'store_discount' => $request->store_discount,
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
