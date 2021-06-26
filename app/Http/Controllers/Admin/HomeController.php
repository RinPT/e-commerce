<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Categories;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tickets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $user = User::get();
        $store = Store::get();
        $product = Product::get();
        $orders = Order::limit(20)->get();
        $order_count = Order::count();
        $ticket_count = Tickets::count();
        $pending_orders_count = Order::where('order_status', '=', 'waiting')->count();
        $daily_orders_count = Order::whereBetween('created_at', [date('Y-m-d'), date('Y-m-d H-i')])->count();

        $cookie_curr = json_decode($_COOKIE['cookie_currency']);

        $totals = [];
        for($i=1;$i<31;$i++){
            $total = 0;
            $bills = Billing::whereDate('created_at', date('Y-m-'.(string)$i))
                ->where('status','paid')
                ->select('currency_code','total')
                ->get();

            foreach ($bills as $bill){
                if($cookie_curr->code != $bill->currency_code){
                    $total += $bill->total * $cookie_curr->rate / $product->cur_rate;
                }else{
                    $total += $bill->total;
                }
            }
            $totals[] = $total;
        }
        return view('admin.home',[
            'user' => $user,
            'store' => $store,
            'product' => $product,
            'orders' => $orders,
            'order_count' => $order_count,
            'pending_orders_count' => $pending_orders_count,
            'daily_orders_count' => $daily_orders_count,
            'ticket_count' => $ticket_count,
            'monthly_sales' => json_encode($totals)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
