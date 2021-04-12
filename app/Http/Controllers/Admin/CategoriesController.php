<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Categories::get();
    	return view('admin.categories.all_categories',[
    		'categories'=> $categories,
    	]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.new_category',[
    		//'categories'=> $categories,
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
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'parent_id' => 'numeric',
            'sort_order' => 'numeric',
            'status' => 'numeric',
        ]);
        
        $image = $request->file('image');
        // Make a image name based on user name and current timestamp
        $imageName = Str::slug($request->input('name')).'_'.time();
        // Define folder path
        $folder = '/images/categories/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $imageName. '.' . $image->extension();
        // Upload image
        $request->image->move(public_path($folder), $imageName. '.' . $image->extension());

        
        $categories = Categories::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $filePath,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'parent_id' => $request->parent_id,
            'sort_order' => $request->sort_order,
            'status' => $request->status,
        ]);

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
        $category = Categories::find($category_id);
        
        return view('admin.categories.edit_category',[
    		'category'=> $category
    	]);
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
        
        $category = Categories::find($category_id);

        
        $this->validate($request, [
            'name' => 'max:32',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'parent_id' => 'numeric',
            'sort_order' => 'numeric',
            'status' => 'numeric',
        ]);

        

        $category = Categories::update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $filePath,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'parent_id' => $request->parent_id,
            'sort_order' => $request->sort_order,
            'status' => $request->status,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category = Categories::find($category_id);
        $category->delete();

        return back();
    }
}
