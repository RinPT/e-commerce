<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.store.index')->with([
            'store' => Store::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.store.create');
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
            $store = Store::create([
                'id' => $request->id,
                'name' => $request->name,
                'logo'=> $request->logo,
                'url'=> $request->url,
                'tax_no'=> $request->tax_no,
                'country_id'=> $request->country_id,
                'city'=> $request->city,
                'address'=> $request->address,
                'phone'=> $request->phone,
                'status'=> $request->status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),


            ]);   
      
            return back()->with('success', 'New store added.');


        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {

                return back()->with('error', 'There is already an store for this name.');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::findOrFail($id);
        return view('admin.store.edit')->with([
            'id' => $id,
            'store' => $store
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
            Store::findOrFail($id)->update([
                'id' => $request->id,
                'name' => $request->name,
                'logo'=> $request->logo,
                'url'=> $request->url,
                'tax_no'=> $request->tax_no,
                'country_id'=> $request->country_id,
                'city'=> $request->city,
                'address'=> $request->address,
                'phone'=> $request->phone,
                'status'=> $request->status,
                'updated_at' => Carbon::now(),
            ]);
            return back()->with('success', 'Information updated successfully');
        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                return back()->with('error', 'Error Updating Store');
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
        Store::findOrFail($id)->delete();
        return back()->with('success', 'Store removed successfully.');
    }
}
