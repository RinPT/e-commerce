<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index(){
        return view('store/stores');
    }

    public function store_products_index(){
        return view('store/store_products');
    }
}
