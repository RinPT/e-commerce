<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Currencies;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    		'email' => 'required',
    		'password' => 'required',
    	]);

    	$user = User::where([
    	    ['username' ,'=', $request->email],
        ])->first();
    	if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user,$remember = true);
                return redirect()->route('home');
            }
        }
        $user = User::where([
            ['email' ,'=', $request->email],
        ])->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user,$remember = true);
                return redirect()->route('home');
            }
        }
        return back()->with('status','Error! Invalid login details');
    }
}
