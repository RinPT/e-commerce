<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index() {
        $user=User::get();
        $groups = Group::get();
        return view('admin.user.index', [
            'users' => $user,
            'groups' => $groups
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
            'username' => 'required|max:255 | unique:users,surname',
            'email'=> 'required|email|max:255 | unique:users,email',
            'password' =>'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with("created", "User ($request->name $request->surname) created successfully!");
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
        ]);

        $user = User::find($id);


        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'gender' => $request->gender,
            'group' => $request->group,
            'status' => $request->status
        ]);
        
        if($request->email != null)
        {
            if($request->email != $user->email)
            {
                $this->validate($request, [
                    'email' => 'required|email|max:255|unique:users,email'
                ]);

                $user->update([
                    'email' => $request->email
                ]);
            }
        }
        else{
            return back()->with("emptyem","E-mail can not be empty");
        }

        if($request->username != null)
        {
            if($request->username != $user->username)
            {
                $this->validate($request, [
                    'username' => 'required|max:255|unique:users,username'
                ]);

                $user->update([
                    'username' => $request->username
                ]);
            }
        }
        else{
            return back()->with("emptyun","Username can not be empty");
        }

        return back()->with("success", "User's information has been updated!");
    }


    public function destroy($user_id)
    {
        User::find($user_id)->delete();
        return back()->with("destroy", "User removed from the system!");
    }
}
