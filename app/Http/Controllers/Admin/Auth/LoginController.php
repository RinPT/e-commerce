<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Group;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{

    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $author = Author::where([
            ['username' ,'=', $request->username]
        ])->first();
        if($author){
            if(Hash::check($request->password,$author->password)){
                $_SESSION['author'] = $author->id;
                $_SESSION['author_type'] = "author";
                $_SESSION['author_group_type'] = "";
                $author->group = json_decode($author->group);
                if(count($author->group)){
                    $group = Group::find($author->group[0]);
                    $_SESSION['author_group_type'] = $group->name;
                }
                return redirect()->route('admin.home');
            }
        }

       $store = Store::where([
            ['username' ,'=', $request->username]
        ])->first();
        if($store){
            if(Hash::check($request->password,$store->password)){
                $_SESSION['author'] = $store->id;
                $_SESSION['author_type'] = "store";
                $_SESSION['author_group_type'] = "store";
                return redirect()->route('store.home');
            }
        }

        return back()->with('error','Author or store not found!');
    }
}
