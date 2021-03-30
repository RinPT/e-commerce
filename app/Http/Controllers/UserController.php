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

    

}
