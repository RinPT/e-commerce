<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\Categories;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {



        return view('order', [

        ]);
    }
}
