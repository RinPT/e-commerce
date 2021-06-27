<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CategoryDiscount;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoryDiscountController extends Controller
{
    public function index() {

        $discounts = CategoryDiscount::get();

        return view('admin.discounts.category.index', [
            'discounts' => $discounts,
        ]);
    }

    public function create() {

        $categories = Categories::get();

        return view('admin.discounts.category.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'category_id' => 'required|unique:store_discount,category_id',
            'store_discount' => 'numeric',
            'main_discount' => 'required|numeric',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            'category_id.unique' => 'Discount for this store is already exists in the system!'
        ]);

        CategoryDiscount::create([
            'category_id' => $request->category_id,
            'store_discount' => $request->store_discount,
            'main_discount' => $request->main_discount,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return back()->with("status", "Discount added to the category successfully.");
    }

    public function update(Request $request, $discount_id) {
        $this->validate($request, [
            'store_discount' => 'numeric',
            'main_discount' => 'required|numeric',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        CategoryDiscount::find($discount_id)->update([
            'store_discount' => $request->store_discount,
            'main_discount' => $request->main_discount,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return back()->with("status", "Category Discount has been updated!");
    }

    public function destroy($discount_id) {
        CategoryDiscount::find($discount_id)->delete();
        return back()->with("destroy", "Discount removed from the category!");
    }
}
