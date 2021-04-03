<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Dotenv\Exception\ValidationException;
use Intervention\Image\Facades\Image as Image;

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

    public function update_info(Request $request)
    {
        $user = User::findOrFail(auth()->user()->user_id);

        //validate request
    	$this -> validate($request, [

    		'name' => 'required|max:255',
    		'surname' => 'required|max:255',
    		'username' => 'required|max:255',
    		'email'=> 'required|email|max:255',
    		'phone' => 'max:255',

    	]);


    	//update user information in the database

    	$user->name = $request->name;
    	$user->surname = $request->surname;
    	$user->username = $request->username;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->gender = $request->gender;
		//$user->date_of_birth = $request-> date_of_birth;

    	$user->save();

    	return back()->with('info', 'Account Information Updated!');
    }

	public function update_password(Request $request) {

        $user = User::findOrFail(auth()->user()->user_id);

		$this -> validate($request, [
			'old_password' => 'required',
    		'password' =>'required|confirmed',
    	]);

		if (password_verify($request->old_password, $user->password)) {
			$user->password = Hash::make($request-> password);
			$user->save();
		}

		else {
			throw ValidationException::withMessages(['old_password' => 'You entered your old password wrong !! Please re-enter']);
		}

    	return back()->with('pass', 'Password Has Changed!');
    }

	public function destroy(User $user) {
        $user->delete();

        return redirect()->route('home');
    }
}
