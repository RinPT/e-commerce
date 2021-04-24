<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\Categories;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {

        $currencies = Currencies::get();
        $categories = Categories::get();
        $items = Categories::tree();

        return view('checkout', [
           'currencies' => $currencies,
           'categories'  => $categories,
           'items' => $items,
        ]);
    }
}
