<?php

namespace App\Http\Controllers\Admin;

use App\Models\Perm;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PermController extends Controller
{

    public function index()
    {
        return view('admin.perm.index')->with([
            'perms' => Perm::all()
        ]);
    }

    public function create()
    {
        return view('admin.perm.create');
    }


    public function store(Request $request)
    {
        try {
            Perm::create([
                'name' => $request->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            return back()->with('success', 'New permission added.');
        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                return back()->with('error', 'There is already a permission for this name.');
            }
        }
        return back();
    }


    public function edit($id)
    {
        $perm = Perm::findOrFail($id);
        return view('admin.perm.edit')->with([
            'id' => $id,
            'perm' => $perm
        ]);
    }

    public function update($id,Request $request)
    {
        try {
            Perm::findOrFail($id)->update([
                'name' => $request->name,
                'updated_at' => Carbon::now()
            ]);
            return back()->with('success', 'Information updated successfully');
        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                return back()->with('error', 'There is already a permission for this name.');
            }
        }
        return back();
    }


    public function destroy($id)
    {
        Perm::findOrFail($id)->delete();
        return back()->with('success', 'Permission removed successfully.');
    }
}
