<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Currencies;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {

        $currencies = Currencies::get();

        return view('users.login', [
            'currencies' => $currencies
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
