<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Currencies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function index() {

        $currencies = Currencies::get();

        return view('users.register', [
            'currencies' => $currencies
        ]);
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
        'last_logged_ipaddress' => "127.0.0.1"
    	]);

    	auth()->attempt($request->only('email','password'));

    	return redirect()->route('home');
    }
}
