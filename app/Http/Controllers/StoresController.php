<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\Store;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index(){
        $stores = Store::all();
        foreach ($stores as $key => $store) {
            $stores[$key]->country = Countries::where('id',$store->country_id)->value('name');
            $stores[$key]->category = Categories::where('id',$store->product_cat_id)->first();
        }
        return view('store/stores',[
            'stores' => $stores
        ]);
    }

    public function store_products_index(){
        return view('store/store_products');
    }
}
