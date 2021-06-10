<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\CategoryDiscount;
use App\Models\Config;
use App\Models\Currencies;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\ProductAttribute;
use App\Models\ProductComment;
use App\Models\ProductOption;
use App\Models\ProductStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($name,$id){

        $def_logo = Config::where('key','default_product_logo')->first();

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

        $category       = Categories::find($product->category_id);
        $cat_discount   = CategoryDiscount::where('category_id',$product->category_id)->first();

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

        /**
         * Reviews
         */
        $reviews = ProductComment::where('product_id',$product->id)
            ->join('users','users.id','=','product_comments.user_id')
            ->select('product_comments.*','users.name','users.surname')
            ->get();

        /**
         * Stock
         */
        $total_stock_count = ProductStock::where('product_id',$id)->sum('stock');
        $product->total_stock_count = $total_stock_count;

        $in_stock = ProductStock::where([
            ['product_id','=',$id],
            ['stock','>','0']
        ])->get();
        $in_stocks = [];
        foreach ($in_stock as $i) {
            $in_stocks[] = $i->name;
        }

        /**
         * Related Products
         */
        $rel_products = Product::where([
            ['category_id','=',$category->id],
            ['products.id','!=',$id]
        ])
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

        foreach ($rel_products as $key => $pp) {
            /**
             * Discount
             */
            $rel_products[$key]->store_discount = $pp->pstore_discount + $pp->sstore_discount;
            $rel_products[$key]->main_discount = $pp->pmain_discount + $pp->smain_discount;

            if(!is_null($cat_discount)){
                $rel_products[$key]->store_discount += $cat_discount->store_discount;
                $rel_products[$key]->main_discount += $cat_discount->main_discount;
            }

            /**
             * Currency
             */
            if($cookie_curr->id != $pp->currency_id){
                $rel_products[$key]->price = number_format($rel_products[$key]->price * $cookie_curr->rate / $pp->cur_rate,2,".","");
            }
            $rel_products[$key]->price -= $rel_products[$key]->price * ($pp->store_discount + $pp->main_discount)/100;
            $rel_products[$key]->price = number_format($rel_products[$key]->price,2,".","");

            /**
             * Image
             */
            $image = Product_Images::where('product_id',$pp->id)->first();
            if(!is_null($image)){
                $rel_products[$key]->image = $image->image;
            }else{
                $rel_products[$key]->image = "";
            }

            /**
             * Rate
             */
            $rev_count  = ProductComment::where('product_id',$pp->id)->count();
            $rate       = ProductComment::where('product_id',$pp->id)->avg('product_rate');
            $rel_products[$key]->product_review_count = $rev_count;

            if(is_null($rate)){
                $rel_products[$key]->product_review = 0;
            }else{
                $rel_products[$key]->product_review = $rate * 20;
            }

            /**
             * Stock
             */
            $total_stock_count = ProductStock::where('product_id',$pp->id)->sum('stock');
            $rel_products[$key]->total_stock_count = $total_stock_count;
        }

        return view('product',[
            'product' => $product,
            'rel_products' => $rel_products,
            'category' => $category,
            'options'  => $options,
            'images' => $images,
            'attributes' => $attributes,
            'reviews' => $reviews,
            'def_logo' => $def_logo,
            'in_stocks' => $in_stocks
        ]);
    }

    public function store_review($id,Request $request){
        ProductComment::create([
            'product_id' => $id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'product_rate' => $request->product_rate,
            'cargo_rate' => $request->cargo_rate,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success','Your review has been submitted.');
    }
}
