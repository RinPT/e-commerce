<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Categories;
use App\Models\CategoryDiscount;
use App\Models\Currencies;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\ProductComment;
use Illuminate\Support\Facades\Request;

class CategoryProductController extends Controller
{
    public function index($name){

        $category       = Categories::where('name',$name)->first();
        $category_advs   = Advertisement::where('category_id',$category->id)->get();
        $cat_discount   = CategoryDiscount::where('category_id',$category->id)->first();

        $rev_nums = [];
        $del_prods = [];
        if(isset($_GET['review'])){
            $reviews = explode('&',$_SERVER['QUERY_STRING']);
            foreach ($reviews as $review) {
                $nums = explode('=',$review);
                if($nums[0] == 'review'){
                    $rev_nums[] = $nums[1];
                }
            }
        }

        $products = Product::where('category_id',$category->id)
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
            ->get();

        $max_price = Product::where('category_id',$category->id)->max('price');
        $min_price = Product::where('category_id',$category->id)->min('price');

        if(Request::input('currency')){
            $cookie_curr = Currencies::where('id',Request::input('currency'))->first();
        }else{
            $cookie_curr = json_decode($_COOKIE['cookie_currency']);
        }

        foreach ($products as $key => $product) {
            /**
             * Currency
             */
            if($cookie_curr->id != $product->currency_id){
                $products[$key]->price = number_format($products[$key]->price * $cookie_curr->rate / $product->cur_rate,2);
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
             * Discount
             */
            $products[$key]->store_discount = $product->pstore_discount + $product->sstore_discount;
            $products[$key]->main_discount = $product->pmain_discount + $product->smain_discount;

            if(!is_null($cat_discount)){
                $products[$key]->store_discount += $cat_discount->store_discount;
                $products[$key]->main_discount += $cat_discount->main_discount;
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
        }

        foreach ($del_prods as $del_prod) {
            unset($products[$del_prod]);
        }

        return view('category_products',[
            'category' => $category,
            'products' => $products,
            'category_advs' => $category_advs,
            'max_price' => $max_price,
            'min_price' => $min_price,
            'rev_nums' => $rev_nums
        ]);
    }
}
