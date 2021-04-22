<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index() {
        $user=User::get();
        return view('admin.user.index', [
            'users' => $user
        ]);
    }

    public function create() {

        return view('admin.user.create');
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
            'password' => Hash::make($request->password)
        ]);

        return back()->with("status", "User ($request->name $request->surname) created successfully!");
    }


    public function destroy($user_id)
    {
        User::find($user_id)->delete();
        return back()->with("destroy", "User removed from the system!");
    }
}
