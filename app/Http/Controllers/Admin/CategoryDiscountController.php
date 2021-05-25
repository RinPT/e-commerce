<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryDiscount;
use App\Http\Controllers\Controller;

class CategoryDiscountController extends Controller
{
    public function index() {

        $discounts = CategoryDiscount::get();

        return view('admin.discounts.category.index', [
            'discounts' => $discounts,
        ]);
    }

    public function create() {

        $products = Product::get();

        return view('admin.discounts.category.create', [
            'products' => $products,
        ]);
    }
}
