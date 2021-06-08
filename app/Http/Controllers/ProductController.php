<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\CategoryDiscount;
use App\Models\Currencies;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\ProductAttribute;
use App\Models\ProductComment;
use App\Models\ProductOption;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($name,$id){

        $product = Product::where('products.id',$id)
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

        $category = Categories::find($product->category_id);
        $cat_discount = CategoryDiscount::where('category_id',$product->category_id)->first();

        if(\Illuminate\Support\Facades\Request::input('currency')){
            $cookie_curr = Currencies::where('id',Request::input('currency'))->first();
        }else{
            $cookie_curr = json_decode($_COOKIE['cookie_currency']);
        }

        /**
         * Discount
         */
        $product->store_discount = $product->pstore_discount + $product->sstore_discount;
        $product->main_discount = $product->pmain_discount + $product->smain_discount;

        if(!is_null($cat_discount)){
            $product->store_discount += $cat_discount->store_discount;
            $product->main_discount += $cat_discount->main_discount;
        }

        /**
         * Currency
         */
        if($cookie_curr->id != $product->currency_id){
            $product->price = number_format($product->price * $cookie_curr->rate / $product->cur_rate,2,".","");
        }
        $product->price -= $product->price * ($product->store_discount + $product->main_discount)/100;
        $product->price = number_format($product->price,2,".","");

        /**
         * Image
         */
        $images = Product_Images::where('product_id',$product->id)->get();

        /**
         * Rate
         */
        $rev_count  = ProductComment::where('product_id',$product->id)->count();
        $rate       = ProductComment::where('product_id',$product->id)->avg('product_rate');
        $product->product_review_count = $rev_count;

        if(is_null($rate)){
            $product->product_review = 0;
        }else{
            $product->product_review = $rate * 20;
        }

        /**
         * Options
         */
        $options = ProductOption::select('name')->groupBy('name')->where('product_id',$product->id)
            ->get();
        foreach ($options as $key => $option) {
            $options[$key]->options =  ProductOption::where([
                ['product_id','=',$product->id],
                ['name','=',$option->name]
            ])->get();
        }

        /**
         * Attributes
         */
        $attributes = ProductAttribute::where('product_id',$product->id)->get();

        return view('product',[
            'product' => $product,
            'category' => $category,
            'options'  => $options,
            'images' => $images,
            'attributes' => $attributes
        ]);
    }
}
