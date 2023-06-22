<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    //  index
    public function manageProduct(){
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.product.index', compact('products'));
    }

    //  add product
    public function addProduct(){
        $categories = Category::all();
        return view('backend.product.add', ['categories' => $categories]);
    }

    //  store product
    public function storeProduct(Request $request){
        $product = new Product();
        $product->createProduct($request);
        return redirect()->route('manage.product')->with('msg', 'Product insert successfully!');
    }

    //  edit
    public function editProduct($id){
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('backend.product.edit', compact('product', 'categories'));
    }

    //  update
    public function updateProduct(Request $request){
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        if($request->hasFile('image')){
            $pro = new Product();
            $product_image = $pro->imageProcessing($request);
            @unlink($request->old_image);
        }
        else{
            $product_image = $request->old_image;
        }
        $product->image = $product_image;
        $product->save();
        return redirect()->route('manage.product')->with('msg', "Product Updated Successfully!");
    }

    //  delete
    public function deleteProduct($id){
        $product = Product::find($id);
        @unlink($product->image);
        $product->delete();
        return redirect()->back()->with('msg', 'Product Deleted Successfully!');
    }

}
