<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index($name){

        $category = Categories::where('name',$name)->get();

        return view('category_products',[
            'category' => $category[0]
        ]);
    }
}
