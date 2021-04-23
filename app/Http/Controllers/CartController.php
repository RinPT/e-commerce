<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {

        $currencies = Currencies::get();

        return view('cart', [
            'currencies' => $currencies
        ]);
    }
}
