<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
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

        $products = Product::get();

        return view('admin.discounts.store.create', [
            'products' => $products,
        ]);
    }
}
