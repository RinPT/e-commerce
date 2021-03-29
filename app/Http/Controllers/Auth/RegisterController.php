<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function store(Request $request)
    {
    	$this -> validate($request, [
    		'name' => 'required|max:255',
    		'surname' => 'required|max:255',
    		'username' => 'required|max:255',
    		'email'=> 'required|email|max:255',
    		'password' =>'required|confirmed',
    	]);

    	User::create([
    	'name' => $request->name,
    	'surname' => $request->surname,
    	'username' => $request->username,
    	'email' => $request->email,
    	'password' => Hash::make($request-> password),
    	]);

    	//sign the user in

    	//auth()-> user(); returns the currently signed in user
    	/*
    	auth()-> attempt([
    	'email'=> $request->email,
    	'password'=> $request->password,
    	]); // signs user in by their email and their password, it authenticates them.
    	or similarly :
		*/
    	auth()->attempt($request->only('email','password'));

    	//redirect user
    	return redirect()->route('home');
    }
}
