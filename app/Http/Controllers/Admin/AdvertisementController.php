<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index() {
        $advertisement=Advertisement::get();
        return view('admin.advertisement.index', [
            'advertisements' => $advertisement,
        ]);
    }

    public function store(Request $request)
    {

        $this -> validate($request, [
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        Advertisement::create([
            'category_id' => $request->category_id,
            'image' => $request->image,
            $path = $request->file('image')->store('public/images/ads'),
        ]);

        return back()->with("success", "Advertisement created successfully!");
    }

    public function create() {

        return view('admin.advertisement.create');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $advertisement = Advertisement::find($id);


        $advertisement->update([
            'category_id' => $request->category_id,
            'image' => $request->image,
            $path = $request->file('image')->store('public/images/ads'),
        ]);
    return back()->with("updated", "Advertisement's information has been updated!");

    }

    public function destroy($id)
    {
        Advertisement::find($id)->delete();
        return back()->with("destroy", "Advertisement removed from the system!");
    }
}
