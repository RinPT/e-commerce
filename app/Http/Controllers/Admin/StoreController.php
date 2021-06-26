<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\Order;
use App\Models\Product;
use App\Models\Ticket_Replies;
use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Store_Requests;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{

    public function index()
    {
        $stores = Store::all();
        foreach ($stores as $key => $store) {
            $country = Countries::findOrFail($store->country_id);
            $stores[$key]->country = $country->name;
            $stores[$key]->product_count = Product::where('store_id',$store->id)->count();
        }
        return view('admin.store.index')->with([
            'stores' => $stores
        ]);
    }

    public function create()
    {
        return view('admin.store.create')->with([
            'countries' => Countries::all(),
            'categories' => Categories::all()
        ]);
    }

    public function store(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255 | unique:store,username',
            'email'=> 'required|email|max:255 | unique:store,email',
            'password' =>'required|confirmed',
            'tax_no' => 'required | unique:store,tax_no',
            'country_id' => 'required | numeric',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required | unique:store,phone',
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

        Store::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'logo'=> isset($filename) ? $filename : "",
            'url'=> $request->url,
            'tax_no'=> $request->tax_no,
            'country_id'=> $request->country_id,
            'product_cat_id' => $request->product_cat_id,
            'city'=> $request->city,
            'address'=> $request->address,
            'phone'=> $request->phone,
            'status'=> isset($request->status)? 1:0,
        ]);
        return back()->with('success', 'New store added.');
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);

        $order_count = Order::where('store_id',$id)->count();
        $product_count = Product::where('store_id',$id)->count();

        $ticket_count = Tickets::where([
            ['receiver_id','=',$id],
            ['receiver_type','=','store'],
        ])->count();

        $order_income = Order::where('store_id',$id)->sum('total');

        $orders = Order::where('store_id',$id)->get();

        return view('admin.store.edit')->with([
            'id' => $id,
            'store' => $store,
            'countries' => Countries::all(),
            'categories' => Categories::all(),
            'order_count' => $order_count,
            'product_count' => $product_count,
            'ticket_count' => $ticket_count,
            'order_income' => $order_income,
            'orders' => $orders
        ]);

    }

    public function update(Request $request, $id)
    {

        $store = Store::find($id);

        $this -> validate($request, [
            'name' => 'required|max:255',
            'country_id' => 'required',
            'city' => 'required',
            'address' => 'required',
            'status' => 'required',

        ]);

        if($store->username !== $request->username) {
            $this->validate($request, [
                'username' => 'required|max:255 | unique:store,username'
            ]);

            $store->update([
                'username' => $request->username,
            ]);
        }

        if($store->email !== $request->email) {
            $this->validate($request, [
                'email'=> 'required|email|max:255 | unique:store,email',
            ]);

            $store->update([
                'email' => $request->email,
            ]);
        }

        if($store->url !== $request->url) {
            $this->validate($request, [
                'url' => 'required | unique:store,url',
            ]);

            $store->update([
                'url' => $request->url,
            ]);
        }

        if($store->tax_no !== $request->tax_no) {
            $this->validate($request, [
                'tax_no' => 'required | unique:store,tax_no',
            ]);

            $store->update([
                'tax_no' => $request->url,
            ]);
        }

        if($store->phone !== $request->phone) {
            $this->validate($request, [
                'phone' => 'required | unique:store,phone',
            ]);

            $store->update([
                'phone' => $request->phone,
            ]);
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {
                $filename = time().".".$file->getClientOriginalExtension();
                $file->storeAs('photo/store',$filename, 'public_html');
            }else{
                return back()->with('error', 'An error occurred while uploading the file.');
            }
        }

        $store->update([
            'id' => $request->id,
            'name' => $request->name,
            'logo'=> isset($filename) ? $filename : "",
            'country_id'=> $request->country_id,
            'product_cat_id'=> $request->product_cat_id,
            'city'=> $request->city,
            'address'=> $request->address,
            'status'=> isset($request->status)? 1:0,
        ]);

        if(!empty($request->password)){
            $store->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return back()->with('success', 'Information updated successfully');
    }

    public function destroy($id)
    {
        Store::findOrFail($id)->delete();
        return back()->with('success', 'Store removed successfully.');
    }

    public function requests_index()
    {

        $countries = Countries::get();

        $store_requests = Store_Requests::all();
        foreach ($store_requests as $key => $store) {
            $country = Countries::findOrFail($store->country_id);
            $store_requests[$key]->country = $country->name;
        }
        return view('admin.store.request')->with([
            'store_requests' => $store_requests,
            'countries' => $countries,
        ]);
    }

    public function reject_request(Request $request, $id) {
        $store_request = Store_Requests::find($id);

        $store_request->update([
            'status' => 'rejected',
            'notes' => $request->notes
        ]);

        return back()->with('rejected', 'This request rejected!');
    }

    public function accept_request($id)
    {
        try {

            $store = Store_Requests::find($id);
            $password = $this->randomPassword();

            Store::create([
                'name' => $store->name,
                'username' => $store->username,
                'email' => $store->email,
                'password'=> Hash::make($password),
                'logo'=> $store->logo ?? "",
                'url'=> $store->url,
                'tax_no'=> $store->tax_no,
                'country_id'=> $store->country_id,
                'product_cat_id'=> $store->product_cat_id,
                'city'=> $store->city,
                'address'=> $store->address,
                'phone'=> $store->phone,
                'status'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            Store_Requests::findOrFail($id)->delete();
            // Mail will be send

            return back()->with('success', 'New store added and store information email has been submitted.');
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return back()->with('error', 'There is already an store for this name.');
            }
        }

        return back()->with('success', 'New store added and store information email has been submitted.');
    }

    public function application(Request $request)
    {
        try {

            $this -> validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email'=> 'required|email|max:255',
            'logo' => 'required|max:255',
            'url' => 'required|max:255',
            'tax_no' => 'required|max:255',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);

            $store_request = Store_Requests::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'logo'=> $request->logo,
                'url'=> $request->url,
                'tax_no'=> $request->tax_no,
                'country_id'=> $request->country,
                'city'=> $request->city,
                'address'=> $request->address,
                'phone'=> $request->phone,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),


            ]);

            return back()->with('success', 'New application added.');


        }
        catch (\Exception $e) { // It's actually a QueryException but this works too
        dd($e);
            if ($e->getCode() == 23000) {
                return back()->with('error', 'There is already an application for this name.');
            }
        }

        return back();

    }

    public function destroy_request($id)
    {
        Store_Requests::findOrFail($id)->delete();
        return back()->with('success', 'Store Request removed successfully.');
    }

    public function add_request($id)
    {
        $store_request = Store_Requests::findOrFail($id);
        return view('admin.store.add')->with([
            'id' => $id,
            'store_request' => $store_request
        ]);
    }

    public function update_request(Request $request, $id) {

        $store_request = Store_Requests::find($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'country_id' => 'required | numeric',
            'product_cat_id' => 'required | numeric',
            'city' => 'required',
            'address' => 'required',
            'notes' => 'required',
        ]);

        $store_request->update([
            'name' => $request->name,
            'country_id' => $request->country_id,
            'product_cat_id' => $request->product_cat_id,
            'city'=> $request->city,
            'address'=> $request->address,
            'notes' => $request->notes,
        ]);

        if($request->email !== $store_request->email) {
            $this->validate($request, [
                'email' => 'required|max:255 | unique:store,email',
                'email' => 'unique:store_requests,email',
            ]);

            $store_request->update([
                'email' => $request->email,
            ]);
        }

        if($request->username !== $store_request->username) {
            $this->validate($request, [
                'username' => 'required|max:255 | unique:store,username',
                'username' => 'unique:store_requests,username',
            ]);

            $store_request->update([
                'username' => $request->username,
            ]);
        }

        if($request->tax_no !== $store_request->tax_no) {
            $this->validate($request, [
                'tax' => 'required|max:255 | unique:store,tax_no',
                'tax' => 'unique:store_requests,tax_no',
            ]);

            $store_request->update([
                'tax_no' => $request->tax,
            ]);
        }

        if($request->phone !== $store_request->phone) {
            $this->validate($request, [
                'phone' => 'required|max:255 | unique:store,phone',
                'phone' => 'unique:store_requests,phone',
            ]);

            $store_request->update([
                'phone' => $request->phone,
            ]);
        }

        return back()->with('updated', 'Store Request updated successfully!');
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

}
