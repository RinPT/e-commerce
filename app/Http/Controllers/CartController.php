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
            $new_product = false;
            $cart_products = json_decode($_COOKIE['cart_products']);
            $optss = (array)json_decode($_POST['optss']);

            foreach ($cart_products as $key => $cart_product) {
                if($cart_product->pid === $_POST['id']){
                    if($cart_product->options == (object)$optss){
                        $cart_products[$key]->count += $_POST['count'];
                        $new_product = false;
                        break;
                    }else{
                        $new_product = true;
                    }
                }else{
                    $new_product = true;
                }
            }

            foreach ($cart_products as $cart_product) {
               $count += $cart_product->count;
            }

            if($new_product){
                $cart_products[] = [
                    'pid' => $_POST['id'],
                    'count' => $_POST['count'],
                    'options' => $optss
                ];
                $count +=$_POST['count'];
            }
            setcookie('cart_products',json_encode($cart_products),time() + 86400 * 30,'/');
        }else{
            $cart_products = [];
            $cart_products[] = [
                'pid' => $_POST['id'],
                'count' => $_POST['count'],
                'options' => (array)json_decode($_POST['optss'])
            ];
            $count = $_POST['count'];
            setcookie('cart_products',json_encode($cart_products),time() + 86400 * 30,'/');
        }

        return response()->json([
            'status' => '1',
            'message' => 'Successfully Added',
            'count' => $count,
        ]);
    }
}
