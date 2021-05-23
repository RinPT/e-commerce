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
        ]);

        if(isset($request->base)){
            Currencies::where('base','1')->update([
                'base' => 0
            ]);
        }

        Currencies::create([
            'name' => $request->name,
            'code' => $request->code,
            'prefix' => $request->prefix,
            'suffix' => $request->suffix,
            'rate' => $request->rate,
            'status' => isset($request->status) ? 1 : 0,
            'base' => isset($request->base) ? 1 : 0,
        ]);
        return back()->with("status", "Currency ($request->name) added to the system successfully.");
    }

    public function update(Request $request, $currency_id) {
        $checkBase = Currencies::where('base','1')->count();
        if(!$checkBase){
            Currencies::first()->update([
                'base' => 1
            ]);
        }
        if(isset($request->base)){
            Currencies::where('base','1')->update([
                'base' => 0
            ]);
        }

        Currencies::find($currency_id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'prefix' => $request->prefix,
            'suffix' => $request->suffix,
            'rate' => $request->rate,
            'status' => isset($request->status) ? 1 : 0,
            'base' => isset($request->base) ? 1 : 0,
        ]);

        return back()->with("status", "$request->name information has been updated!");
    }

    public function destroy($currency_id) {
        Currencies::find($currency_id)->delete();
        return back()->with("destroy", "Currency removed from the system!");
    }
}
