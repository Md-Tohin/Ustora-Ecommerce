<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //  manage category
    public function manageCategory(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.category.index', compact('categories'));
    }

    //  add category
    public function addCategory(){
        return view('backend.category.add');
    }

    //  store category
    public function storeCategory(Request $request){
        $category = new Category();
        $category->createCategory($request);
        return redirect()->route('manage.category')->with('msg', "Category Created Successfully!");
    }


}
