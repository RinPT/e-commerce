<?php

namespace App\Http\Controllers\Store;

use App\Models\Store;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Currencies;
use Illuminate\Support\Str;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Models\ProductOption;
use App\Models\Product_Images;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product_Attribute_Stock;

class ProductController extends Controller
{

    private $logged_author;

    public function __construct() {
        $this->logged_author = app('App\Http\Controllers\GlobalController')->index();
    }

    public function index()
    {
        $categories=Categories::get();
        $stores=Store::get();
        $currencies=Currencies::get();
        //$products = Product::where('store_id', '=', $this->logged_author->id)->get();

        $products = DB::table('products')
        ->join('currencies', 'currencies.id', '=', 'products.currency_id')
        ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
        ->where('store_id', '=', $this->logged_author->id)
        ->select( 'products.name', 'categories.id as cid', 'products.description', 'products.cargo_price', 'products.price', 'products.id', 'currencies.suffix as currency', 'products.updated_at')
        ->get();

        foreach ($products as $key => $product) {
            $products[$key] ->stock = ProductStock::where('product_id', '=', $product->id)->sum('stock');
        };

       
    	return view('store.products.index',[
    		'products'=> $products,
            'categories'=> $categories,           
            'currencies'=> $currencies,
            'stores'=> $stores,
    	]);
    }

    public function create()
    {
        $categories=Categories::get();
        $stores=Store::get();
        $currencies=Currencies::get();
        $options=ProductOption::get();

        return view('store.products.create',[
            'categories'=> $categories,
            'stores'=> $stores,
            'currencies'=> $currencies,
            'options' => $options,
    	]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:32',
            'description' => 'required',
            'images' => 'required', 
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|numeric',
            'cargo_price' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'ar' => 'nullable',
            'option' => 'nullable',
            'stock[]' => 'nullable|numeric',
        ]);

        if($request->file('ar')!=null){
            $arName = Str::slug($request->input('name')).'_'.time().'_';
            // Define folder path
            $folder = '/AR/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $arName. '.usdz';
            // Upload image
            $request->file('ar')->move(public_path($folder), $arName. '.usdz');

            $product = Product::create([
                'name' => $request->name,
                'store_id' => $request->store_id,
                'description' => $request->description,
                'price' => $request->price,
                'ar' => $filePath,
                'cargo_price' => $request->cargo_price,
                'currency_id' => $request->currency_id,
            ]);
        }
        else {
        $product = Product::create([
            'name' => $request->name,
            'store_id' => $this->logged_author->id,
            'description' => $request->description,
            'price' => $request->price,
            'cargo_price' => $request->cargo_price,
            'currency_id' => $request->currency_id,
        ]);    
        }

        $option = $request->get('option');
        $option = array_filter($option, 'strlen');
        $stocks = $request->get('stock');
        $stocks = array_filter($stocks, 'strlen');

        for ($i=0; $i<count($optstock); $i++){ //TODO: Add presets to make it easier for seller (color size combinations, red small, blue medium)
            $optstock = ProductOption::create([
                'product_id' => $product->id,
                'option' => $option[$i],
                'stock' => $stocks[$i],
            ]);
        }


        $counter=0;
        foreach($request->file('images') as $image) {
            $counter++;
            // Make a image name based on user name and current timestamp
            $imageName = Str::slug($request->input('name')).'_'.time().'_'.$counter;
            // Define folder path
            $folder = '/images/products/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $imageName. '.' . $image->extension();
            // Upload image
            $image->move(public_path($folder), $imageName. '.' . $image->extension());

            Product_Images::create([
                'product_id' => $product->id,
                'image' => $filePath,
            ]);
        }
/*
        $attributes = $request->get('attribute');
        $attributes = array_filter($attributes, 'strlen');
        $stocks = $request->get('stock');
        $stocks = array_filter($stocks, 'strlen');
        
        for ($i=0; $i<count($attributes); $i++){ //TODO: Add presets to make it easier for seller (color size combinations, red small, blue medium)
            $attrstocks = Product_Attribute_Stock::create([
                'product_id' => $product->id,
                'attribute' => $attributes[$i],
                'stock' => $stocks[$i],
            ]);
        }*/

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $edit_product = Product::find($product_id);
        $categories=Categories::get();
        $stores=Store::get();
        $currencies=Currencies::get();
        $product_images=Product_Images::where('product_id', $product_id)->pluck('image')->toArray();
        $attribute = Product_Attribute_Stock::where('product_id', $product_id)->get()->toArray();

        return view('store.products.edit',[
            'product'=> $edit_product,
            'stores'=> $stores,
            'currencies'=> $currencies,
            'product_images'=> $product_images,
            'attributes'=> $attribute,
    	]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $this->validate($request, [
            'name' => 'max:32',
            'description' => 'required',
            //'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'numeric',
            'cargo_price' => 'numeric',
            'currency_id' => 'numeric',
        ]);

        $product = Product::find($product_id);
        
        
        if($request->file('images')!=null)
        {
            $productImages = Product_Images::where('product_id', $product_id);
            foreach($productImages->get() as $image){
                $dir = public_path($image->image);
                if(file_exists($dir)) {
                    unlink($dir);
                }
            }
            $productImages->delete();

            $counter=0;
            foreach($request->file('images') as $image) {
                $counter++;
                // Make a image name based on user name and current timestamp
                $imageName = Str::slug($request->input('name')).'_'.time().'_'.$counter;
                // Define folder path
                $folder = '/images/products/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $imageName. '.' . $image->extension();
                // Upload image
                $image->move(public_path($folder), $imageName. '.' . $image->extension());

                Product_Images::create([
                    'product_id' => $product->id,
                    'image' => $filePath,
                ]);
            }
        }

        if($request->file('ar')!=null){
            if(!empty($product->ar)){
                $dir = public_path($product->ar);
                if(file_exists($dir)) {
                    unlink($dir);
                }  
            }


            $arName = Str::slug($request->input('name')).'_'.time().'_';
            // Define folder path
            $folder = '/AR/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $arName. '.usdz';
            // Upload image
            $request->file('ar')->move(public_path($folder), $arName. '.usdz');

            $product->update([
                'ar' => $filePath
            ]);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'cargo_price' => $request->cargo_price,
            'currency_id' => $request->currency_id,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $product = Product::find($product_id);

        $productImages = Product_Images::where('product_id', $product_id);
            foreach($productImages->get() as $image){
                $dir = public_path($image->image);
                if(file_exists($dir)) {
                    unlink($dir);
                }
            }
        $productImages->delete();
        $product->delete();

        Product_Attribute_Stock::where('product_id', $product_id)->delete();

        return back();
    }
}
