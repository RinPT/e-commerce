<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use App\Models\Currencies;
use Illuminate\Http\Request;
use App\Models\ProductComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductProfileController extends Controller
{
    public function index(Product $product) {

        $currencies = Currencies::get();
        $categories = Categories::get();
        $items = Categories::tree();
        $avgstar = ProductComment::avg('product_rate');

        $comments = DB::table('product_comments')
        ->join('users', 'users.id', '=', 'product_comments.user_id')
        ->join('products', 'products.id', '=', 'product_comments.product_id')
        ->select('users.photo', 'product_comments.comment', 'product_comments.product_rate', 'product_comments.created_at', 'product_comments.product_id')->get();


        /*
        $randoms = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('product_images', 'product_images.product_id', '=', 'products.id')
        ->join('product_comments', 'products.id', '=', 'product_comments.product_id' )
        ->where('products.id', '!=', $product->id)
        ->select('products.id', 'product_images.image', 'products.name', 'products.price', 'products.category_id', 'product_comments.product_rate', 'product_comments.product_id')
        ->get();
        */

        $randoms = DB::table('products')
        ->where([
            ['products.category_id','=', $product->category_id],
            ['products.id', '!=', $product->id]
        ])
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
        ->leftJoin('product_comments', 'products.id', '=', 'product_comments.product_id')
        ->select('products.id', 'product_images.image', 'products.name', 'products.price', 'product_comments.product_rate', 'categories.name as cname')
        ->get();
         
        return view('product_profile', [
            'product' => $product,
            'currencies' => $currencies,
            'categories'  => $categories,
            'items' => $items,
            'comments' => $comments,
            'randoms' => $randoms,
            'avgstar' => $avgstar,
        ]);
    }

    public function store(Request $request, $product_id) {



        if (Auth::Check()) {
            $this -> validate($request, [
                'comment' => 'required'
            ]);

            ProductComment::create([
                'comment' => $request->comment,
                'user_id' => auth()->user()->id,
                'product_id' => $product_id,
                'product_rate'=> $request->product_rate,
            ]);
        }

        else{
            $this -> validate($request, [
                'comment' => 'required',
                'name' => 'required',
                'email' => 'required'
            ]);

            Users::create([
                'name' => $request->name,
                'email' => $request->email,

            ]);

            ProductComment::create([
                'comment' => $request->comment,
                'product_rate'=> $request->product_rate,
            ]);
        }
        return back()->with('success', 'Your comment is added.');
    }
}
