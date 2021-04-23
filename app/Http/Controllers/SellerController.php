<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __invoke() {
        return view('seller_application');
    }
}
