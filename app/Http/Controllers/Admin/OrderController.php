<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.index')->with([
            'orders' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $order = Order::create([
                'store_id' => $request->store_id,
                'store_name' => $request->store_name,
                'store_url'=> $request->store_url,
                'user_id'=> $request->user_id,
                'user_type'=> $request->store_id,
                'name'=> $request->name,
                'surname'=> $request->surname,
                'username'=> $request->username,
                'email'=> $request->email,
                'gender'=> $request->gender,
                'comment'=> $request->comment,
                'total'=> $request->total,
                'order_status'=> $request->order_status,
                'currency_code'=> $request->currency_code,
                'ip_address'=> $request->ip_address,
                'user_agent'=> $request->user_agent,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),


            ]);          
            return back()->with('success', 'New order added.');


        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {

                return back()->with('error', 'There is already an order for this name.');
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_pending()
    {
        return view('admin.order.index')->with([
            'orders' => DB::select('select * from orders where order_status = ?', ['waiting'])
        ]);
    }

    public function show_canceled()
    {
        return view('admin.order.index')->with([
            'orders' => DB::select('select * from orders where order_status = ?', ['cancelled'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.edit')->with([
            'id' => $id,
            'order' => $order
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
        try {
            Order::findOrFail($id)->update([
                'store_id' => $request->store_id,
                'store_name' => $request->store_name,
                'store_url'=> $request->store_url,
                'user_id'=> $request->user_id,
                'user_type'=> $request->store_id,
                'name'=> $request->name,
                'surname'=> $request->surname,
                'username'=> $request->username,
                'email'=> $request->email,
                'gender'=> $request->gender,
                'comment'=> $request->comment,
                'total'=> $request->total,
                'order_status'=> $request->order_status,
                'currency_code'=> $request->currency_code,
                'ip_address'=> $request->ip_address,
                'user_agent'=> $request->user_agent,
                'updated_at' => Carbon::now()
            ]);
            return back()->with('success', 'Information updated successfully');
        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                return back()->with('error', 'Error Updating Order');
            }
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('success', 'Order removed successfully.');
    }
}
