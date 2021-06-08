<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\Categories;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $sliders = Slider::get();

    	return view('home', [
            'sliders' => $sliders
        ]);
    }
}
