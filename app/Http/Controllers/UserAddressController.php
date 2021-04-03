<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function destroy(Request $request,UserAddress $UserAddress)
    {
    	$address_id = func_get_args()[3];


    	$useraddress=UserAddress::where('address_id',$address_id);
    	$useraddress->delete();

        return back();

    }

    public function update(Request $request)
    {

        $user=auth()->user();
        $address_id=func_get_args()[2];
        $useraddress=UserAddress::where('address_id',$address_id)->first();


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
