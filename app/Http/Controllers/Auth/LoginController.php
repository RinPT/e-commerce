<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Currencies;
use App\Models\Categories;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {

        $currencies = Currencies::get();
        $categories = Categories::get();
        $items = Categories::tree();

        return view('users.login', [
            'currencies' => $currencies,
            'categories'  => $categories,
            'items' => $items
        ]);
    }

    public function store(Request $request) {

    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required',
    	]);


    	if(!auth()->attempt($request->only('email','password'), $request->remember)) {

    		return back()->with('status','Invalid Login Details');
    	}

    	return redirect()->route('home');
    }
}
