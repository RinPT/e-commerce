<?php

namespace App\Http\Controllers;

use App\Models\CategoryDiscount;
use App\Models\Config;
use App\Models\Currencies;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\ProductCoupon;
use App\Models\ProductStock;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {

        if(isset($_COOKIE['cart_products'])){
            $cart_products = json_decode($_COOKIE['cart_products']);
        }else{
            $cart_products = [];
        }

        if(count($cart_products)==0){
            return redirect()->route('cart');
        }

        if(isset($_COOKIE['used_coupones'])){
            $used_coupones = json_decode($_COOKIE['used_coupones']);
            $coupones = [];
            foreach ($used_coupones as $id) {
                $coupones[] = ProductCoupon::find($id);
            }
            $used_coupones = $coupones;
        }else{
            $used_coupones = [];
        }

        foreach ($cart_products as $key => $cart_product) {
            $cart_product->product = Product::where('products.id',$cart_product->pid)
                ->join('store','store.id','=','products.store_id')
                ->join('currencies','currencies.id','=','products.currency_id')
                ->leftjoin('product_discount','product_discount.product_id','=','products.id')
                ->leftjoin('store_discount','store_discount.store_id','=','store.id')
                ->select('products.*',
                    'store.name as store_name','store.id as store_id',
                    'currencies.prefix',
                    'currencies.suffix',
                    'currencies.rate as cur_rate',
                    'product_discount.store_discount as pstore_discount',
                    'product_discount.main_discount as pmain_discount',
                    'store_discount.store_discount as sstore_discount',
                    'store_discount.main_discount as smain_discount',
                )
                ->first();

            $category       = Categories::find($cart_product->product->category_id);
            $cat_discount   = CategoryDiscount::where('category_id',$category->id)->first();

            if(\Illuminate\Support\Facades\Request::input('currency')){
                $cookie_curr = Currencies::where('id',Request::input('currency'))->first();
            }else{
                $cookie_curr = json_decode($_COOKIE['cookie_currency']);
            }

            /**
             * Discount
             */
            $cart_product->product->store_discount = $cart_product->product->pstore_discount + $cart_product->product->sstore_discount;
            $cart_product->product->main_discount = $cart_product->product->pmain_discount + $cart_product->product->smain_discount;

            if(!is_null($cat_discount)){
                $cart_product->product->store_discount += $cat_discount->store_discount;
                $cart_product->product->main_discount += $cat_discount->main_discount;
            }

            /**
             * Currency
             */
            if($cookie_curr->id != $cart_product->product->currency_id){
                $cart_product->product->price = number_format($cart_product->product->price * $cookie_curr->rate / $cart_product->product->cur_rate,2,".","");
                $cart_product->product->cargo_price = number_format($cart_product->product->cargo_price * $cookie_curr->rate / $cart_product->product->cur_rate,2,".","");
            }
            $cart_product->product->price -= $cart_product->product->price * ($cart_product->product->store_discount + $cart_product->product->main_discount)/100;
            $cart_product->product->price = number_format($cart_product->product->price,2,".","");


            /**
             * Image
             */
            $images = Product_Images::where('product_id',$cart_product->product->id)->get();
            $cart_product->product->images = $images;
            /**
             * Stock
             */
            $total_stock_count = ProductStock::where('product_id',$cart_product->pid)->sum('stock');
            $cart_product->product->total_stock_count = $total_stock_count;
        }

        $addresses = UserAddress::where('user_id',auth()->user()->id)->get();

        return view('checkout', [
            'addresses' => $addresses,
            'cart_products' => $cart_products,
            'used_coupones' => $used_coupones,
        ]);
    }

    public function secure_index(Request $request){
        return view('secure',[
            'delivery_id' => $request->delivery_id,
            'billing_id' => $request->billing_id,
            'ptype' => $request->ptype
        ]);
    }
}
