<?php

namespace App\Http\Controllers\User;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function store(Request $request) {

    	UserAddress::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'user_type' => 'individual', //$request->user_type,
            'company' => 'EMU', //$request->company,
            'tax_no' => 1, //$request->tax_no,
            'country_id' => 1, //$request->country_id,
            'city' => $request->city,
            'address' => $request->address,
            'address_type' => $request->address_type,
            'postcode' => $request->postcode,
            'telephone' => $request->telephone,
            'user_id' => auth()->user()->user_id,
    	]);

    	return back()->with('newAddress', 'New Address Added!');
    }
}
