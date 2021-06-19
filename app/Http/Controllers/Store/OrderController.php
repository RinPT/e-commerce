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
        $orders = Order::where('store_id', '=', $this->logged_author->id)->where('order_status', '=', 'approved')->get();

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
        $orders = Order::where('store_id', '=', $this->logged_author->id)->where('order_status', '=', 'cancelled')->get();

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

    public function update(Request $request, $id) {

        $order = Order::find($id);

        $this->validate($request, [
            'order_status' => 'required',
        ]);

        $order->update([
            'order_status' => $request->order_status,
        ]);

        return back()->with('updated', 'Order status has been updated! This order is now in "'.$order->order_status.'" table.');

    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('deleted', 'Order removed from the system successfully.');
    }
}
