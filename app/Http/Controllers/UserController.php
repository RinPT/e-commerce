<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
    	return view('users.UserProfile',[
    		'user'=>$user
    	]);
    }

    public function destroy(User $user)
    {
        //to delete the user from the system
        $user->delete();

        return redirect()-> route('home');
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
    	$user->date_of_birth = $request-> date_of_birth;


    	$user->save();

    	return view('users.UserProfile',[
    		'user'=>$user
    	]);
    }

    public function update_password(User $user, Request $request)
    {
		$this -> validate($request, [
			'old_password' => 'required',
    		'password' =>'required|confirmed', //it will look for any data you submited with '_confirmed' and make sure these 2 match
    	]);

		if (password_verify($request->old_password, $user->password))
		{
			$user->password =  Hash::make($request-> password);
			$user->save();
		}
		else
		{
			throw ValidationException::withMessages(['old_password' => 'You entered your old password wrong !! Please re-enter']);
		}

    	return view('users.UserProfile',[
    		'user'=>$user
    	]);
    }
}