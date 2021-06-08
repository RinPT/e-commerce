<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryDiscount;
use App\Models\Config;
use App\Models\Currencies;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\ProductComment;
use App\Models\ProductStock;
use Illuminate\Support\Facades\Request;

class SearchController extends Controller
{
    public function index(){
        $query = request()->get('q');
        if(is_null($query)){
            return redirect()->route('home');
        }
        $per_page   = Config::where('key','product_count_per_click_category_page')->value('value');

        $rev_nums   = [];
        $del_prods  = [];
        if(isset($_GET['review'])){
            $reviews = explode('&',$_SERVER['QUERY_STRING']);
            foreach ($reviews as $review) {
                $nums = explode('=',$review);
                if($nums[0] == 'review'){
                    $rev_nums[] = $nums[1];
                }
            }
        }

        $products = Product::where('products.name','like',"%$query%")
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
            ->paginate($per_page);

        $max_price = 0;
        $min_price = 0;
        if(count($products)){
            $min_price = $products[0]->price;
        }

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

            if($products[$key]->price > $max_price){
                $max_price = $products[$key]->price;
            }
            if($min_price > $products[$key]->price){
                $min_price = $products[$key]->price;
            }

            if(isset($_GET['min']) && isset($_GET['max'])){
                $min_price = $_GET['min'];
                $max_price = $_GET['max'];
                if($products[$key]->price < $_GET['min'] || $products[$key]->price > $_GET['max']){
                    $del_prods[] = $key;
                }
            }

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
             * Rate
             */
            $rev_count  = ProductComment::where('product_id',$product->id)->count();
            $rate       = ProductComment::where('product_id',$product->id)->avg('product_rate');
            $products[$key]->product_review_count = $rev_count;

            if(isset($_GET['review'])){
                if(!in_array((int)$rate,$rev_nums)){
                    $del_prods[] = $key;
                }
            }

            if(is_null($rate)){
                $products[$key]->product_review = 0;
            }else{
                $products[$key]->product_review = $rate * 20;
            }

            /**
             * Stock
             */
            $total_stock_count = ProductStock::where('product_id',$product->id)->sum('stock');
            $products[$key]->total_stock_count = $total_stock_count;
        }

        foreach ($del_prods as $del_prod) {
            unset($products[$del_prod]);
        }

        $def_logo = Config::where('key','default_product_logo')->first();


        return view('search',[
            'products' => $products,
            'max_price' => $max_price,
            'min_price' => $min_price,
            'rev_nums' => $rev_nums,
            'def_logo' => $def_logo
        ]);
    }
}
