<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Models\Perm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        return view('admin.group.index')->with([
            'groups' => Group::all()
        ]);
    }

    public function create()
    {
        return view('admin.group.create')->with([
            'perms' => Perm::all()
        ]);
    }

    public function store(Request $request)
    {
        try {
            Group::create([
                'name' => $request->name,
                'permissions' => json_encode($request->perms)
            ]);
            return back()->with('success', 'New group added.');
        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                return back()->with('error', 'There is already a group for this name.');
            }
        }
        return back();
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        $group->permissions = json_decode($group->permissions);
        return view('admin.group.edit')->with([
            'id' => $id,
            'group' => $group,
            'perms' => Perm::all()
        ]);
    }

    public function update($id,Request $request)
    {
        try {
            Group::findOrFail($id)->update([
                'name' => $request->name,
                'permissions' => is_null($request->perms) ? [] : json_encode($request->perms),
                'updated_at' => Carbon::now()
            ]);
            return back()->with('success', 'Information updated successfully');
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return back()->with('error', 'There is already a group for this name.');
            }
        }
        return back();
    }

    public function destroy($id)
    {
        Group::findOrFail($id)->delete();
        return back()->with('success', 'Group removed successfully.');
    }
}
