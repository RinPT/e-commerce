<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\CategoryDiscount;
use App\Models\Config;
use App\Models\Countries;
use App\Models\Currencies;
use App\Models\Categories;
use App\Models\Order;
use App\Models\OrderShipping;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\ProductCoupon;
use App\Models\ProductStock;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Treq;

class OrderController extends Controller
{
    public function index(Request $request) {

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

        if(Treq::input('currency')){
            $cookie_curr = Currencies::where('id',Request::input('currency'))->first();
        }else{
            $cookie_curr = json_decode($_COOKIE['cookie_currency']);
        }

        $products = [];
        $cargo_pids = [];
        $total_price = 0;
        $total_cargo  = 0;
        foreach ($cart_products as $key => $cart_product) {
            $cart_product->product = Product::where('products.id',$cart_product->pid)
                ->join('store','store.id','=','products.store_id')
                ->join('currencies','currencies.id','=','products.currency_id')
                ->leftjoin('product_discount','product_discount.product_id','=','products.id')
                ->leftjoin('store_discount','store_discount.store_id','=','store.id')
                ->select('products.*',
                    'store.name as store_name','store.id as store_id', 'store.url as store_url',
                    'store.tax_no as store_tax_no','store.country_id as store_cid','store.city as store_city',
                    'store.address as store_address','store.phone as store_phone',
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

            $total_price = $total_price + ($cart_product->product->price * $cart_product->count);

            /**
             * Stock
             */
            $total_stock_count = ProductStock::where('product_id',$cart_product->pid)->sum('stock');
            $cart_product->product->total_stock_count = $total_stock_count;


            /**
             * Order Table Data
             */
            $products[$cart_product->product->store_id]['user'] = [
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'surname' => auth()->user()->surname,
                'username'=> auth()->user()->username,
                'email' => auth()->user()->email,
                'gender'=> auth()->user()->gender,
            ];

            $country = Countries::find($cart_product->product->store_cid);

            $products[$cart_product->product->store_id]['store'] = [
                'store_id' => $cart_product->product->store_id,
                'store_name' => $cart_product->product->store_name,
                'store_tax_no' => $cart_product->product->store_tax_no,
                'store_country' => $country->name,
                'store_city' => ucfirst($cart_product->product->store_city),
                'store_address' => $cart_product->product->store_address,
                'store_phone' => $cart_product->product->store_phone,
            ];

            $products[$cart_product->product->store_id]['products'][] = [
                'pid' => $cart_product->pid,
                'pname' => $cart_product->product->name,
                'pcount' => $cart_product->count,
                'pprice'=> $cart_product->product->price,
                'cargoprice' => $cart_product->product->cargo_price,
                'options' => $cart_product->options
            ];
            if(!in_array($cart_product->pid,$cargo_pids)){
                $products[$cart_product->product->store_id]['coupones'][] = $used_coupones;
            }

            if(!in_array($cart_product->pid,$cargo_pids)){
                $total_cargo += $cart_product->product->cargo_price;
            }
            $cargo_pids[] = $cart_product->pid;
        }

        foreach ($used_coupones as $used_coupone) {
            if($used_coupone->rate){
                $total_price -= $total_price * $used_coupone->rate / 100;
            }else{
                $total_price -= $used_coupone->price;
            }
        }
        $total_price += $total_cargo;

        $delivery_address   = UserAddress::find($request->delivery_id);
        $billing_address    = UserAddress::find($request->billing_id);


        $oids = [];
        foreach ($products as $sid => $info) {

            $pprice = 0;
            foreach ($info['products'] as $pp) {
                $pprice += $pp['pprice'] * $pp['pcount'];
            }

            foreach ($used_coupones as $used_coupone) {
                if($used_coupone->rate){
                    $pprice -= $pprice * $used_coupone->rate / 100;
                }else{
                    $pprice -= $used_coupone->price;
                }
            }
            $ppids = [];
            foreach ($info['products'] as $pp) {
                if(!in_array($pp['pid'],$ppids)){
                    $pprice += $pp['cargoprice'];
                }
                $ppids[] = $pp['pid'];
            }

            $oid = Order::insertGetId([
                'store_id' => $sid,
                'store_name' => $info['store']['store_name'],
                'store_tax_no' => $info['store']['store_tax_no'],
                'store_country' => $info['store']['store_country'],
                'store_city' => $info['store']['store_city'],
                'store_address' => $info['store']['store_address'],
                'store_phone' => $info['store']['store_phone'],
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'surname' => auth()->user()->surname,
                'username'=> auth()->user()->username,
                'email' => auth()->user()->email,
                'gender'=> auth()->user()->gender,
                'products' => json_encode($info['products']),
                'coupons' => json_encode($info['coupones']),
                'total'=> $pprice,
                'order_status' => 'waiting',
                'currency_code' => $cookie_curr->code,
                'currency_prefix' => $cookie_curr->prefix,
                'currency_suffix' => $cookie_curr->suffix,
                'ip_address' =>  $_SERVER['REMOTE_ADDR'] == '::' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'] ,
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $oids[] = $oid;

            OrderShipping::create([
                'order_id' => $oid,
                'name' => $delivery_address->name,
                'surname' => $delivery_address->surname,
                'user_type' => $delivery_address->user_type,
                'company' => $delivery_address->company ?? "",
                'tax_no' => $delivery_address->tax_no ?? "",
                'country' => $delivery_address->country->name,
                'city' => $delivery_address->city,
                'address' => $delivery_address->address,
                'address_type' => $delivery_address->address_type,
                'post_code' => $delivery_address->post_code ?? "",
                'telephone' => $delivery_address->telephone,
                'tracking_number' => '',
                'status' => 'preparing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $iid = Config::where('key','invoice_last')->value('value');

            Billing::create([
                'invoice_no' => $iid,
                'user_id' => auth()->user()->id,
                'store_id' => $sid,
                'store_name' => $info['store']['store_name'],
                'store_tax_no' => $info['store']['store_tax_no'],
                'store_country' => $info['store']['store_country'],
                'store_city' => $info['store']['store_city'],
                'store_address' => $info['store']['store_address'],
                'store_phone' => $info['store']['store_phone'],
                'name' => $billing_address->name,
                'surname' => $billing_address->surname,
                'user_type' => $billing_address->user_type,
                'company' => $billing_address->company ?? "",
                'tax_no' => $billing_address->tax_no ?? "",
                'country' => $billing_address->country->name,
                'city' => $billing_address->city,
                'address' => $billing_address->address,
                'address_type' => $billing_address->address_type,
                'post_code' => $billing_address->post_code ?? "",
                'telephone' => $billing_address->telephone,
                'method' => $request->ptype,
                'bank' => "",
                'products' => json_encode($info['products']),
                'coupons' => json_encode($info['coupones']),
                'currency_code' => $cookie_curr->code,
                'currency_prefix' => $cookie_curr->prefix,
                'currency_suffix' => $cookie_curr->suffix,
                'total'=> $pprice,
                'status' => $request->status ?? "unpaid"
            ]);

            Config::where('key','invoice_last')->update([
                'value' => $iid+1
            ]);
        }

        foreach ($used_coupones as $id) {
            ProductCoupon::destroy($id);
        }

        setcookie('cart_products',null,-1,'/');
        setcookie('used_coupones',null,-1,'/');

        return view('order', [
            'oids'      => $oids,
            'status'    => 'preparing',
            'date'      => Carbon::now(),
            'mail'      => auth()->user()->email,
            'total'     => $total_price,
            'method'    => $request->ptype,
            'curr'      => $cookie_curr,
            'products'  => $cart_products,
            'coupons'   => $used_coupones,
            'billing_address' => $billing_address,
            'delivery_address' => $delivery_address
        ]);
    }

    public function destroy_order(Request $request){

        $order = Order::find($request->id);
        if($order->order_status == 'cancel request'){
            Order::find($request->id)->update([
                'order_status' => 'waiting'
            ]);
            return back()->with('order.success','Order cancellation request has been cancelled.');
        }else{
            Order::find($request->id)->update([
                'order_status' => 'cancel request'
            ]);
            return back()->with('order.success','Order cancellation request has been sent.');
        }

    }
}
