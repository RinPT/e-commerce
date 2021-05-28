<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Countries;
use App\Models\Store;
use App\Models\Store_Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    public function index() {
        $cats = Categories::all();
        $countries = Countries::all();
        return view('seller_application', [
            'categories' => $cats,
            'countries' => $countries
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255 | unique:store,username',
            'username' => 'unique:store_requests,username',
            'email'=> 'required|email|max:255 | unique:store,email',
            'email' => 'unique:store_requests,email',
            'tax' => 'required | unique:store,tax_no',
            'tax' => 'unique:store_requests,tax_no',
            'country' => 'required | numeric',
            'category' => 'required | numeric',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required | unique:store,phone',
            'phone' => 'unique:store_requests,phone',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {
                $filename = time().".".$file->getClientOriginalExtension();
                $file->storeAs('photo/store',$filename, 'public_html');
            }else{
                return back()->with('error', 'An error occurred while uploading the file.');
            }
        }

        Store_Requests::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'logo'=> isset($filename) ? $filename : "",
            'url'=> $request->url ?? "",
            'tax_no'=> $request->tax,
            'country_id'=> $request->country,
            'product_cat_id' => $request->category,
            'city'=> $request->city,
            'address'=> $request->address,
            'phone'=> $request->phone,
            'status'=> 'waiting',
        ]);

        return back()->with('success', 'The seller application form has been submitted successfully.');
    }
}
