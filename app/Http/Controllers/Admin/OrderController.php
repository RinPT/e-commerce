<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index() {

        $orders = Order::where('order_status', '=', 'approved')->get();

        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    public function show_pending() {

        $orders = Order::where('order_status', '=', 'waiting')->get();

        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    public function show_canceled() {

        $orders = Order::where('order_status', '=', 'cancelled')->get();

        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    public function cancel_request() {

        $orders = Order::where('order_status', '=', 'cancell request')->get();

        return view('admin.order.index', [
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

    public function destroy($id) {
        Order::findOrFail($id)->delete();
        return back()->with('success', 'Order removed successfully.');
    }
}
