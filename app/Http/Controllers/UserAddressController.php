<?php

namespace App\Http\Controllers;

use App\Models\UserAdress;
use App\Models\Countries;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
    	$user=auth()->user();
    	$useraddress=UserAdress::where('user_id',auth()->user()->user_id)->orderBy('created_at','desc')->paginate(20); //returns all posts and paginates it ( how many you want to display per page ). In tailwind ( not in css or bootstrap) if you use $posts->links it automatically does iteration of pages for you.

    	return view('users.UserAddress',[
    		'user_address'=> $useraddress,
    		'user'=> $user
    	]);
    }

    public function destroy(Request $request,UserAdress $useradress)
    {
    	$address_id = func_get_args()[3];


    	$useraddress=UserAdress::where('address_id',$address_id);
    	$useraddress->delete();

        return back();

    }

    public function show()
    {
    	$user=auth()->user();
        $countries=Countries::get();
    	return view('users.AddUserAddress',[
    	'user'=> $user,
        'countries' => $countries,
    ]);
    }

    public function store(Request $request)
    {

    	$user=auth()->user();
    	UserAdress::create([
    	'name' => $request-> name,
    	'surname' => $request-> surname,
    	'user_type' => $request-> user_type,
    	'company' => $request-> company,
    	'tax_no' => $request-> tax_no,
    	'country_id' => $request-> country_id,
    	'city' => $request-> city,
    	'address' => $request-> address,
    	'address_type' => $request-> address_type,
    	'postcode' => $request-> postcode,
    	'telephone' => $request-> telephone,
    	'user_id' => $user-> user_id,

    	]);

    	return redirect()-> route('user.address',$user);


    }

    public function display(Request $request, UserAdress $useraddress)
    {
        $address_id=func_get_args()[3];
        $countries=Countries::get();
        $useraddress=UserAdress::where('address_id',$address_id)->first();


        return view('users.UpdateUserAddress',[
            'useraddress'=> $useraddress,
            'user' => auth()->user(),
            'countries' => $countries,
        ]);

    }

    public function update(Request $request)
    {

        $user=auth()->user();
        $address_id=func_get_args()[2];
        $useraddress=UserAdress::where('address_id',$address_id)->first();


        $useraddress->name = $request-> name;
        $useraddress->surname = $request-> surname;
        $useraddress->user_type =$request-> user_type;
        $useraddress->company = $request-> company;
        $useraddress->tax_no = $request-> tax_no;
        $useraddress->country_id = $request-> country_id;
        $useraddress->city = $request-> city;
        $useraddress->address = $request-> address;
        $useraddress->address_type = $request-> address_type;
        $useraddress->postcode = $request-> postcode;
        $useraddress->telephone = $request-> telephone;
        $useraddress->user_id = $user-> user_id;

        $useraddress->save();


        return redirect()-> route('user.address',$user);
    }
}
