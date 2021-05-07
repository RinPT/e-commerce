<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Store;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Currencies;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product_Images;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

    	return view('admin.products.index',[
    		'products'=> $products,
    	]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categories::get();
        $stores=Store::get();
        $currencies=Currencies::get();

        return view('admin.products.create',[
            'categories'=> $categories,
            'stores'=> $stores,
            'currencies'=> $currencies,
    	]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:32',
            'store_id' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|numeric',
            'images' => 'required', 
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|numeric',
            'cargo_price' => 'required|numeric',
            'currency_id' => 'required|numeric',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'store_id' => $request->store_id,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'cargo_price' => $request->cargo_price,
            'currency_id' => $request->currency_id,
        ]);

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

        return view('admin.products.edit',[
            'product'=> $edit_product,
            'categories'=> $categories,
            'stores'=> $stores,
            'currencies'=> $currencies,
            'product_images'=> $product_images,
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
            'store_id' => 'numeric',
            'description' => 'required',
            'category_id' => 'numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
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

        $product->update([
            'name' => $request->name,
            'store_id' => $request->store_id,
            'description' => $request->description,
            'category_id' => $request->category_id,
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

        return back();
    }
}
