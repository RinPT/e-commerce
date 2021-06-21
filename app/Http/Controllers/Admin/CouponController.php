<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCoupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index() {
        $coupons = ProductCoupon::get();

        return view('admin.coupons.index', [
            'coupons' => $coupons,
        ]);
    }

    public function create() {
        return view('admin.coupons.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'code' => 'required|unique:coupons,code',
            'rate' => 'required|numeric',
            'price' => 'required|numeric',
            'end_date' => 'required|date'
        ]);

        $coupon = ProductCoupon::create([
            'code' => $request->code,
            'rate' => $request->rate,
            'price' => $request->price,
            'end_date' => $request->end_date
        ]);

        return back()->with('created', 'New coupon ('.$coupon->code.') added to the system.');
    }

    public function update(Request $request, $id) {

        $coupon = ProductCoupon::find($id);

        $this->validate($request, [
            'rate' => 'required|numeric',
            'price' => 'required|numeric',
            'end_date' => 'required|date'
        ]);

        $coupon->update([
            'rate' => $request->rate,
            'price' => $request->price,
            'end_date' => $request->end_date
        ]);

        if($coupon->code !== $request->code) {
            $this->validate($request, [
                'code' => 'required|unique:coupons,code',
            ]);

            $coupon->update([
                'code' => $request->code,
            ]);
        }

        return back()->with('updated', 'Coupon information has been updated!');
    }

    public function destroy($id) {
        $coupon = ProductCoupon::find($id)->delete();

        return back()->with('deleted', 'Coupon has been deleted from the system!');
    }
}
