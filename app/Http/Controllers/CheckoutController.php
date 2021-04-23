<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {

        $currencies = Currencies::get();

        return view('checkout', [
           'currencies' => $currencies
        ]);
    }
}
