<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {

        return view('cart');
    }

    public function store() {
        $count = 0;
        if(isset($_COOKIE['cart_products'])){
            $cart_products = json_decode($_COOKIE['cart_products']);
            foreach ($cart_products as $key => $cart_product) {
                if($cart_product->pid == $_POST['id']){
                    $cart_products[$key]->count += 1;
                }
                $count += $cart_products[$key]->count;
            }
            setcookie('cart_products',json_encode($cart_products),time() + 86400 * 30,'/');
        }else{
            $cart_products = [];
            $cart_products[] = [
                'pid' => $_POST['id'],
                'count' => 1
            ];
            $count = 1;
            setcookie('cart_products',json_encode($cart_products),time() + 86400 * 30,'/');
        }

        return response()->json([
            'status' => '1',
            'message' => 'Successfully Added',
            'count' => $count,
        ]);
    }
}
