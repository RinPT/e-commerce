<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cargo.index')->with([
            'countries' => Countries::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cargo.create');
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
            $countries = Countries::create([
                'id' => $request->id,
                'name' => $request->name,
                'iso_code'=> $request->iso_code,
                'status'=> $request->status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),


            ]);          
            return back()->with('success', 'New country added.');


        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {

                return back()->with('error', 'There is already an country for this name.');
            }
        }

        return back()->with('created', 'Successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Countries::findOrFail($id);

        return view('admin.cargo.edit')->with([
            'id' => $id,
            'countries' => $countries
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
            Countries::findOrFail($id)->update([
                'id'=> $request->id,
                'name'=> $request->name,
                'iso_code'=> $request->iso_code,
                'status'=> $request->status,
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
        Countries::findOrFail($id)->delete();
        return back()->with('destroy', 'Order removed successfully.');
    }
}
