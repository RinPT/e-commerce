<?php

namespace App\Http\Controllers\User;

use App\Models\Billing;
use App\Models\Countries;
use App\Models\Order;
use App\Models\Store;
use App\Models\Ticket_Department_Cfields;
use App\Models\Ticket_Departments;
use App\Models\Tickets;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currencies;
use App\Models\Categories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $user = User::findOrFail(auth()->user()->id);
        $addresses = UserAddress::latest()->paginate(20);
        $currencies = Currencies::get();
        $categories = Categories::get();
        $items = Categories::tree();

        $countries = Countries::all();

        $bills  = Billing::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        $orders = Order::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();

        $departments = Ticket_Departments::where('status','1')->get();
        $stores = Store::where('status','1')->select('id','name')->get();
        $cfields = Ticket_Department_Cfields::all();

        $tickets = Tickets::where([
             ['sender_id','=',auth()->user()->id],
             ['sender_type','=','user']
        ])
            ->join('ticket_departments','ticket_departments.id','=','tickets.department_id')
            ->select('tickets.*','ticket_departments.name as name')
            ->get();

        return view('users.account', [
            'user' => $user,
            'addresses' => $addresses,
            'currencies' => $currencies,
            'categories'  => $categories,
            'items' => $items,
            'countries' => $countries,
            'bills' => $bills,
            'orders' => $orders,
            'departments' => $departments,
            'stores'      => $stores,
            'cfields'     => $cfields,
            'tickets'     => $tickets
        ]);
    }

    public function update_info(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        //validate request
    	$this -> validate($request, [

    		'name' => 'required|max:255',
    		'surname' => 'required|max:255',
    		'username' => 'required|max:255',
    		'email'=> 'required|email|max:255',
    		'phone' => 'max:255',

    	]);


    	//update user information in the database

    	$user->name = $request->name;
    	$user->surname = $request->surname;
    	$user->username = $request->username;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->gender = $request->gender;
		//$user->date_of_birth = $request-> date_of_birth;

    	$user->save();

    	return back()->with('info', 'Account Information Updated!');
    }

	public function update_password(Request $request) {

        $user = User::findOrFail(auth()->user()->id);

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

    	return back()->with('pass', 'Password Has Changed!');
    }

	public function destroy() {

        $user = User::findOrFail(auth()->user()->id);
        $user->delete();

        return redirect()->route('home');
    }

}
