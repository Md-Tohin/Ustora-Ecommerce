<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
     //  index
     public function manageSlider(){
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('backend.slider.index', compact('sliders'));
    }

    //  add slider
    public function addSlider(){
        return view('backend.slider.add');
    }

    //  store slider
    public function storeSlider(Request $request){
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $slider->imageProcessing($request);
        $slider->save();
        return redirect()->route('manage.slider')->with('msg', 'Slider insert successfully!');
    }

}
