<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(User $user) {
        return view('users.account', [
            'user' => $user,
        ]);
    }

    public function update_info(User $user, Request $request)
    {
    	//validate request
    	$this -> validate($request, [

    		'name' => 'required|max:255',
    		'surname' => 'required|max:255',
    		'username' => 'required|max:255',
    		'email'=> 'required|email|max:255',
    		'phone' => 'max:255',

    	]);


    	//update user information in the database

    	$user->name = $request-> name;
    	$user->surname = $request-> surname;
    	$user->username = $request-> username;
    	$user->email = $request-> email;
    	$user->phone = $request-> phone;
    	$user->gender = $request-> gender;


    	$user->save();

    	return back();
    }
}
