<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryDiscount;
use App\Models\Config;
use App\Models\Currencies;
use App\Models\Product_Images;
use App\Models\ProductStock;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index(){

        $products = Wishlist::where('user_wishlist.user_id',auth()->user()->id)
            ->join('products','products.id','=','user_wishlist.product_id')
            ->join('store','store.id','=','products.store_id')
            ->join('currencies','currencies.id','=','products.currency_id')
            ->leftjoin('product_discount','product_discount.product_id','=','products.id')
            ->leftjoin('store_discount','store_discount.store_id','=','store.id')
            ->select('products.*',
                'currencies.prefix',
                'currencies.suffix',
                'currencies.rate as cur_rate',
                'product_discount.store_discount as pstore_discount',
                'product_discount.main_discount as pmain_discount',
                'store_discount.store_discount as sstore_discount',
                'store_discount.main_discount as smain_discount',
                'user_wishlist.id as wid',
            )
            ->get();

        if(Request::input('currency')){
            $cookie_curr = Currencies::where('id',Request::input('currency'))->first();
        }else{
            $cookie_curr = json_decode($_COOKIE['cookie_currency']);
        }

        foreach ($products as $key => $product) {

            $cat_discount = CategoryDiscount::where('category_id',$product->category_id)->first();

            /**
             * Discount
             */
            $products[$key]->store_discount = $product->pstore_discount + $product->sstore_discount;
            $products[$key]->main_discount = $product->pmain_discount + $product->smain_discount;

            if(!is_null($cat_discount)){
                $products[$key]->store_discount += $cat_discount->store_discount;
                $products[$key]->main_discount += $cat_discount->main_discount;
            }

            /**
             * Currency
             */
            if($cookie_curr->id != $product->currency_id){
                $products[$key]->price = number_format($products[$key]->price * $cookie_curr->rate / $product->cur_rate,2,".","");
            }
            $products[$key]->price -= $products[$key]->price * ($product->store_discount + $product->main_discount)/100;
            $products[$key]->price = number_format($products[$key]->price,2,".","");

            /**
             * Image
             */
            $image = Product_Images::where('product_id',$product->id)->first();
            if(!is_null($image)){
                $products[$key]->image = $image->image;
            }else{
                $products[$key]->image = "";
            }

            /**
             * Stock
             */
            $total_stock_count = ProductStock::where('product_id',$product->id)->sum('stock');
            $products[$key]->total_stock_count = $total_stock_count;
        }

        $def_logo = Config::where('key','default_product_logo')->first();

        return view('users.wishlist',[
            'wishlist' => $products,
            'def_logo' => $def_logo
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

    public function destroy($id){
        Wishlist::find($id)->delete();
        return back()->with('success','Product has been removed from wishlist.');
    }
}
