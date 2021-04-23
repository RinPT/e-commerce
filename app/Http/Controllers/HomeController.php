<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $currencies = Currencies::get();

    	return view('home', [
            'currencies'  => $currencies,
        ]);
    }
}
