<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();

        return view('users.wishlist',[
            'wishlist' => $wishlist
        ]);
    }

    public function store(){
        $count = Wishlist::where([
            'product_id' => $_POST['id'],
            'user_id' => Auth::id(),
        ])->count();

        if(!$count){
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $_POST['id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        return response()->json([
            'message' => 'Successfully Added'
        ]);
    }
}
