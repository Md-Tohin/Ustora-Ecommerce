<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $gen_name = rand(100000000, 999999999);
            $img_ex = $image->getClientOriginalExtension();
            $img_name =  $gen_name.'.'.$img_ex;
            $directory = 'assets/upload/brand_images/';
            $save_path = $directory.$img_name;
            $image->move($directory, $img_name);
        }
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->image = $save_path;
        $brand->save();
        return redirect()->route('brands.index')->with('msg', 'Brand inserted Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $gen_name = rand(100000000, 999999999);
            $img_ex = $image->getClientOriginalExtension();
            $img_name =  $gen_name.'.'.$img_ex;
            $directory = 'assets/upload/brand_images/';
            $save_path = $directory.$img_name;
            $image->move($directory, $img_name);
            @unlink($request->old_image);
        }
        else{
            $save_path = $request->old_image;
        }
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->image = $save_path;
        $brand->save();

        return redirect()->route('brands.index')->with('msg', 'Brand Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        @unlink($brand->image);
        $brand->delete();
        return redirect()->back()->with('msg', 'Brand Deleted Successfully!');
    }
}
