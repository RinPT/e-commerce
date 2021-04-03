<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Countries;
use App\Models\UserAdress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Dotenv\Exception\ValidationException;
use Intervention\Image\Facades\Image as Image;

class AccountController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(User $user) 
	{
		
		$addresses = UserAdress::where('user_id','=',auth()->user()->user_id)->get();
        return view('users.account', [
            'user' => $user,
			'addresses' => $addresses
        ]);
    }


    public function destroy_address(Request $request,UserAdress $useradress)
    {
    	$address_id = func_get_args()[3];


    	$useraddress=UserAdress::where('address_id',$address_id);
    	$useraddress->delete();

        return back();

    }

    public function show_add_address()
    {
    	$user=auth()->user();
        $countries=Countries::get();
    	return view('users.AddUserAddress',[
    	'user'=> $user,
        'countries' => $countries,
    ]);
    }

    public function store_new_address(Request $request)
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

    public function show_update_address(Request $request, UserAdress $useraddress)
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

    public function store_updated_address(Request $request)
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


    public function update_info(User $user, Request $request)
    {
    	//validate request
    	$this -> validate($request, [

    		'name' => 'required|max:255',
    		'surname' => 'required|max:255',
    		'username' => 'required|max:255',
    		'email'=> 'required|email|max:255',
    		'phone' => 'max:255',

    	]);


    	//update user information in the database

    	$user->name = $request-> name;
    	$user->surname = $request-> surname;
    	$user->username = $request-> username;
    	$user->email = $request-> email;
    	$user->phone = $request-> phone;
    	$user->gender = $request-> gender;
		//$user->date_of_birth = $request-> date_of_birth;

    	$user->save();

    	return back();
    }

	public function update_password(User $user, Request $request) {
		$this -> validate($request, [
			'old_password' => 'required',
    		'password' =>'required|confirmed',
    	]);

		if (password_verify($request->old_password, $user->password)) {
			$user->password = Hash::make($request-> password);
			$user->save();
		}

		else {
			throw ValidationException::withMessages(['old_password' => 'You entered your old password wrong !! Please re-enter']);
		}

    	return back();
    }

	public function destroy(User $user) {

        $user->delete();

        return redirect()->route('home');
    }
}
