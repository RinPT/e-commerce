<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currencies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function index() {
        $currencies = Currencies::get();

        return view('admin.currency.index', [
            'currencies' => $currencies,
        ]);
    }

    public function create() {
        return view('admin.currency.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'prefix'=> 'required',
            'suffix' => 'required',
            'rate' => 'required|numeric',
            'status' => 'string',
        ]);

        Currencies::create([
            'name' => $request->name,
            'code' => $request->code,
            'prefix' => $request->prefix,
            'suffix' => $request->suffix,
            'rate' => $request->rate,
            'status' => $request->status,
        ]);

        return back()->with("status", "Currency ($request->name) added to the system successfully.");
    }

    public function update(Request $request, $currency_id) {


        Currencies::find($currency_id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'prefix' => $request->prefix,
            'suffix' => $request->suffix,
            'rate' => $request->rate,
            'base' => 1,
            'status' => 1,
        ]);

        return back()->with("status", "$request->name information has been updated!");
    }

    public function destroy($currency_id) {
        Currencies::find($currency_id)->delete();
        return back()->with("destroy", "Currency removed from the system!");
    }
}
