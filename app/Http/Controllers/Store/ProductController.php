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
use App\Models\ProductAttribute;

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
        ->select( 'products.name', 'categories.id as cid', 'products.description',
            'products.cargo_price', 'products.price', 'products.id', 'currencies.suffix as currency', 'products.updated_at','products.ar')
        ->get();

        foreach ($products as $key => $product) {

            $product_options = ProductOption::where('product_id', '=', $product->id)->get();

            foreach($product_options as $option) {
                $products[$key] -> option[] = [
                    'option' => $option,
                    'stock' => ProductStock::where([
                        ['name', '=', $option->value],
                        ['product_id', '=', $product->id]
                        ])->first()
                ];
            }
            $products[$key] -> totalstock = ProductStock::where('product_id', '=', $product->id)->sum('stock');
            $products[$key]->images = Product_Images::where('product_id', '=', $product->id)->get();
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
        ]);

        $product = Product::create([
            'name' => $request->name,
            'store_id' => $this->logged_author->id,
            'category_id' =>$this->logged_author->product_cat_id,
            'description' => $request->description,
            'price' => $request->price,
            'cargo_price' => $request->cargo_price,
            'currency_id' => $request->currency_id,
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
                'ar' => $filePath,
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
        foreach ($request->attribute_value as $key=> $k){
            $this->validate($request,[
                'attribute_value'.$k => 'required',
                'attribute_name'.$k => 'required',
                'stock'.$k => 'required|numeric',
            ]);
        }*/

        $attribute_values = $request->attribute_value;
        $names = $request->attribute_name;
        $stocks = $request->stock;

        foreach ($attribute_values as $key => $attribute){
            if ($names[$key] != null && $attribute != null){
                ProductOption::create([
                    'product_id' => $product->id,
                    'name' => $names[$key],
                    'value' => $attribute,
                    'is_stock_value' => is_null($stocks[$key]) ? 0 : 1
                ]);
            }
        }


        foreach ($stocks as $key=>$stock){
            if ($stock>0 && $names[$key] != null) {
                $attribute_stocks[] = ProductStock::create([
                    'product_id' => $product->id,
                    'stock' => $stock,
                    'name' => $attribute_values[$key],
                ]);
            }
        }

        return back()->with('created','Product added to the system.');
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'numeric',
            'cargo_price' => 'numeric',
            'currency_id' => 'numeric',
        ]);

        $product = Product::find($product_id);
        $product_option = ProductOption::find($product_id);
        $product_stock = ProductStock::find($product_id);


        if($request->file('images') != null)
        {
            $counter=0;
            foreach($request->file('images') as $image) {
                $counter++;
                // Make a image name based on user name and current timestamp
                $imageName = Str::slug($request->input('name')).'_'.time().'_'.$counter;
                // Define folder path
                $folder = '/photo/product';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $imageName. '.' . $image->extension();
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

        $attribute_values = $request->attribute_value;
        $names = $request->attribute_name;
        $stocks = $request->stock;

        if(ProductOption::where('value', '=', $attribute_values)->exists() && ProductStock::where('name', '=', $names)->exists()){
            foreach ($attribute_values as $key => $attribute){
                if ($names[$key] != null && $attribute != null){
                    $product_option->update([
                        'product_id' => $product->id,
                        'name' => $names[$key],
                        'value' => $attribute,
                        'is_stock_value' => is_null($stocks[$key]) ? 0 : 1
                    ]);
                }
            }

            foreach ($stocks as $key=>$stock){
                if ($stock>0 && $names[$key] != null) {
                    $product_stock->update([
                        'product_id' => $product->id,
                        'stock' => $stock,
                        'name' => $attribute_values[$key],
                    ]);
                }
            }
        }
        if(ProductOption::where('value', '!=', $attribute_values)->exists() || ProductStock::where('name', '!=', $names)->exists()){
            foreach ($attribute_values as $key => $attribute){
                if ($names[$key] != null && $attribute != null){
                    ProductOption::create([
                        'product_id' => $product->id,
                        'name' => $names[$key],
                        'value' => $attribute,
                        'is_stock_value' => is_null($stocks[$key]) ? 0 : 1
                    ]);
                }
            }


            foreach ($stocks as $key=>$stock){
                if ($stock>0 && $names[$key] != null) {
                    $attribute_stocks[] = ProductStock::create([
                        'product_id' => $product->id,
                        'stock' => $stock,
                        'name' => $attribute_values[$key],
                    ]);
                }
            }
        }


        return back()->with('success','Product information updated successfully');
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

        ProductStock::where('product_id', $product_id)->delete();
        ProductOption::where('product_id', $product_id)->delete();

        return back();
    }
}
