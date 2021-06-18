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
use App\Models\Wishlist;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as TRequest;

class CartController extends Controller
{
    public function index() {

        if(isset($_COOKIE['cart_products'])){
            $cart_products = json_decode($_COOKIE['cart_products']);
        }else{
            $cart_products = [];
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

        $def_logo = Config::where('key','default_product_logo')->value('value');

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

            if(Request::input('currency')){
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

        return view('cart',[
            'cart_products' => $cart_products,
            'used_coupones' => $used_coupones,
            'def_logo' => $def_logo
        ]);
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

    public function update(){
        $cart_products = json_decode($_COOKIE['cart_products']);
        $cart_products[$_POST['id']]->count = $_POST['count'];
        setcookie('cart_products',json_encode($cart_products),time() + 86400 * 30,'/');

        return response()->json([
            'status' => 1,
            'message' => 'Updated successfully'
        ]);
    }

    public function apply_coupon(TRequest $request){

        $coupon = ProductCoupon::where('code',$request->coupon_code)->first();
        if($coupon){
            if(isset($_COOKIE['used_coupones'])){
                $used_coupones = json_decode($_COOKIE['used_coupones']);
                if(in_array($coupon->id,$used_coupones)){
                    return back()->with('error','Coupon code has already been used');
                }
                $used_coupones[] = $coupon->id;
                setcookie('used_coupones',json_encode($used_coupones),time() + 86400 * 30,'/');
            }else{
                $used_coupones = [$coupon->id];
                setcookie('used_coupones',json_encode($used_coupones),time() + 86400 * 30,'/');
            }

            return back()->with('success','Coupone code used successfully');
        }else{
            return back()->with('error','No coupons for this code');
        }
    }

    function delete_coupon($id){
        $used_coupones = json_decode($_COOKIE['used_coupones']);
        foreach ($used_coupones as $key => $used_coupone) {
            if($used_coupone == $id){
                unset($used_coupones[$key]);
                break;
            }
        }
        setcookie('used_coupones',json_encode(array_values($used_coupones)),time() + 86400 * 30,'/');
        return back()->with('success','Coupone code removed successfully');
    }

    public function destroy(TRequest $request,$id){
        $cart_products = json_decode($_COOKIE['cart_products']);
        foreach ($cart_products as $key => $cart_product) {
            if($cart_product->pid == $id){
                unset($cart_products[$key]);
                break;
            }
        }
        if(count($cart_products)){
            setcookie('cart_products',json_encode(array_values($cart_products)),time() + 86400 * 30,'/');
        }else{
            setcookie('cart_products',null,-1,'/');
        }
        return back()->with('success','Product removed successfully');
    }
}
