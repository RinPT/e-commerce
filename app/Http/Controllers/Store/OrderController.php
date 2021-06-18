<?php

namespace App\Http\Controllers\Store;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private $logged_author;

    public function __construct() {
        $this->logged_author = app('App\Http\Controllers\GlobalController')->index();
    }

    public function index()
    {
        $orders = Order::where('store_id', '=', $this->logged_author->id)->get();

        return view('store.orders.index', [
            'orders' => $orders
        ]);
    }

    public function show_pending()
    {
        $orders = Order::where('store_id', '=', $this->logged_author->id)->where('order_status', '=', 'waiting')->get();

        return view('store.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function show_canceled()
    {
        $orders = Order::where('store_id', '=', $this->logged_author->id)->where('order_status', '=', 'waiting')->get();

        return view('store.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function show_cancel_request() {
        $orders = Order::where('store_id', '=', $this->logged_author->id)->where('order_status', '=', 'cancell request')->get();

        return view('store.orders.index', [
            'orders' => $orders,
        ]);
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.edit')->with([
            'id' => $id,
            'order' => $order
        ]);
    }

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
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return back()->with('error', 'Error Updating Order');
            }
        }
        return back();
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('success', 'Order removed successfully.');
    }
}
