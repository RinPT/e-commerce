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

        return back()->with('updated', $slider->name.' updated!');
    }
}
