<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {

        $currencies = Currencies::get();

        return view('order', [
            'currencies' => $currencies
        ]);
    }
}
