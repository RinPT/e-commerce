<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function store(Request $request) {

        $this -> validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'user_type' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'address_type' => 'required',
            'postcode' => 'required',
            'telephone' => 'required',
        ]);

    	UserAddress::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'surname' => $request->surname,
            'user_type' => $request->user_type,
            'company' => $request->company,
            'tax_no' => $request->tax_no,
            'country_id' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'address_type' => $request->address_type,
            'postcode' => $request->postcode,
            'telephone' => $request->telephone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    	]);

    	return back()->with('address.add', 'New Address Added!');
    }

    public function update($address_id, Request $request) {

        $this -> validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'user_type' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'address_type' => 'required',
            'postcode' => 'required',
            'telephone' => 'required',
        ]);

        UserAddress::find($address_id)->update([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'surname' => $request->surname,
            'user_type' => $request->user_type,
            'company' => $request->company,
            'tax_no' => $request->tax_no,
            'country_id' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'address_type' => $request->address_type,
            'postcode' => $request->postcode,
            'telephone' => $request->telephone,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('address.update', 'Address Updated Successfully!');
    }

    public function destroy($address_id) {

        $address = UserAddress::find($address_id);

        $address->delete();

        return back()->with('address.delete', 'Address Removed from Your Account!');

    }
}
