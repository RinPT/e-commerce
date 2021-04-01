<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('users.login');
    }

    public function store(Request $request)
    {
    	//validate the user
    	$this -> validate($request, [
    		'email'=> 'required|email',
    		'password' =>'required',
    	]);


    	if(!auth()->attempt($request->only('email','password'), $request-> remember))
    	{
    		return back()-> with('status','Invalid Login Details');
    		//shortcut to where the user last visited back()
    		//with() place the message into the session() so you can access it on the views with session('status')
    	}
    	return redirect()-> route('home');
    }	
}
