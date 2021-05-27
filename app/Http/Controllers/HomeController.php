<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {


    	return view('home');
    }
}
