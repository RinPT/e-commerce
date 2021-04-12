<?php

namespace App\Http\Controllers\User;

use App\Models\User;
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
            'user_id' => auth()->user()->id,
    	]);

    	return back()->with('address.add', 'New Address Added!');
    }

    public function update($address_id, Request $request) {

        UserAddress::find($address_id)->update([
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
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('address.update', 'Address Updated Successfully!');
    }

    public function destroy($address_id) {

        $address = UserAddress::find($address_id);

        $address->delete();

        return back()->with('address.delete', 'Address Removed from Your Account!');

    }
}
