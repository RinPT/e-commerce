<?php

namespace App\Http\Controllers\Store;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct() {
        $this->logged_author = app('App\Http\Controllers\GlobalController')->index();
    }

    public function index() {
        $orders = Order::where('store_id', '=', $this->logged_author->id)->count();
        $products = Product::where('Store_id', '=', $this->logged_author->id)->count();

        return view('store.home', [
            'orders' => $orders,
            'products' => $products,
        ]);
    }
}
