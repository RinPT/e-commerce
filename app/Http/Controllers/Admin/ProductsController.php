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
        $currencies = Currencies::get();

    	return view('admin.products.index',[
    		'products'=> $products,
            'currencies' => $currencies,
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
            'images' => 'required', //TODO: Make sure to verify each image
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
    public function edit($category_id)
    {
        // $edit_category = Categories::find($category_id);
        // $all_categories = Categories::get();
        // return view('admin.categories.edit_category',[
    	// 	'edit_category'=> $edit_category,
        //     'all_categories'=> $all_categories
    	// ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $this->validate($request, [
        //     'name' => 'max:32',
        //     'images' => 'image|mimes:jpeg,png,jpg,gif,svg',
        //     'parent_id' => 'numeric',
        //     'sort_order' => 'numeric',
        //     'status' => 'numeric',
        // ]);

        // $category = Categories::find($id);

        // if($request->file('image')!=null)
        // {
        //     $image = $request->file('image');
        //     // Make a image name based on user name and current timestamp
        //     $imageName = Str::slug($request->input('name')).'_'.time();
        //     // Define folder path
        //     $folder = '/images/categories/';
        //     // Make a file path where image will be stored [ folder path + file name + file extension]
        //     $filePath = $folder . $imageName. '.' . $image->extension();
        //     // Upload image
        //     $request->image->move(public_path($folder), $imageName. '.' . $image->extension());

        //     $path = public_path() . $category->image;
        //     #dd($path);
        //     if(file_exists($path)) {
        //         unlink($path);
        //     }

        //     $category->update([
        //         'name' => $request->name,
        //         'description' => $request->description,
        //         'images' => $filePath,
        //         'meta_title' => $request->meta_title,
        //         'meta_keywords' => $request->meta_keywords,
        //         'meta_description' => $request->meta_description,
        //         'parent_id' => $request->parent_id,
        //         'sort_order' => $request->sort_order,
        //         'status' => $request->status,
        //     ]);


        // }

        // else {
        //     $category->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'meta_title' => $request->meta_title,
        //     'meta_keywords' => $request->meta_keywords,
        //     'meta_description' => $request->meta_description,
        //     'parent_id' => $request->parent_id,
        //     'sort_order' => $request->sort_order,
        //     'status' => $request->status,
        // ]);
        //     }

        // return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        // $category = Categories::find($category_id);

        // $path = public_path() . $category->image;
        // if(file_exists($path)) {
        //     unlink($path);
        // }
        // $category->delete();

        // return back();
    }
}
