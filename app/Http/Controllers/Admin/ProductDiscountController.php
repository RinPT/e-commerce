<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProdcutDiscount;
use App\Http\Controllers\Controller;

class ProductDiscountController extends Controller
{
    public function index() {

        $discounts = ProdcutDiscount::get();

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
}
