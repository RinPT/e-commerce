<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
        $categories=Categories::get();
        return view('admin.categories.new_category',[
    		'categories'=> $categories,
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
        $edit_category = Categories::find($category_id);
        $all_categories = Categories::get();
        return view('admin.categories.edit_category',[
    		'edit_category'=> $edit_category,
            'all_categories'=> $all_categories
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
        
        $this->validate($request, [
            'name' => 'max:32',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'parent_id' => 'numeric',
            'sort_order' => 'numeric',
            'status' => 'numeric',
        ]);

        $category = Categories::find($id);

        if($request->file('image')!=null)
        {
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $imageName = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/images/categories/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $imageName. '.' . $image->extension();
            // Upload image
            $request->image->move(public_path($folder), $imageName. '.' . $image->extension());

            $path = public_path() . $category->image;
            #dd($path);
            if(file_exists($path)) {
                unlink($path);
            }

            $category->update([
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


        }

        else {
            $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'parent_id' => $request->parent_id,
            'sort_order' => $request->sort_order,
            'status' => $request->status,
        ]);
            }

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

        $path = public_path() . $category->image;
        if(file_exists($path)) {
            unlink($path);
        }
        $category->delete();

        return back();
    }
}
