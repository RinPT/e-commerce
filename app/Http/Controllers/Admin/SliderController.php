<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index() {

        $sliders = Slider::get();

        return view('admin.slider.edit', [
            'sliders' => $sliders,
        ]);
    }

    public function create() {
        return view('admin.slider.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:sliders,name',
            'header' => 'required',
            'text' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
        ]);

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            if ($file->isValid()) {
                $filename = time().".".$file->getClientOriginalExtension();
                $file->storeAs('photo/slider',$filename, 'public_html');
            }else{
                return back()->with('error', 'An error occurred while uploading the file.');
            }
        }

        $slider = Slider::create([
            'name' => $request->name,
            'header' => $request->header,
            'text' => $request->text,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link,
            'banner' => isset($filename) ? $filename : ""
        ]);

        return back()->with('created', 'New slider ('.$slider->name.') added to the system!');

    }

    public function destroy($id) {
        $slider = Slider::find($id);
        $slider->delete();

        return back()->with('deleted', 'Slider removed from the system!');
    }

    public function update(Request $request, $id) {

        $slider = Slider::find($id);

        $this->validate($request, [
            'header' => 'required',
            'text' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
        ]);

        $slider->update([
            'header' => $request->header,
            'text' => $request->text,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link,
        ]);

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            if ($file->isValid()) {
                $filename = time().".".$file->getClientOriginalExtension();
                $file->storeAs('photo/slider',$filename, 'public_html');
            }else{
                return back()->with('error', 'An error occurred while uploading the file.');
            }
        }

        $slider->update([
            'banner' => isset($filename) ? $filename : "",

        ]);

        return back()->with('updated', $slider->name.' updated!');
    }
}
