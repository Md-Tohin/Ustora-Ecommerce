<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //  home
    public function index(){
        $products = Product::orderBy('id', 'desc')->get();
        $sliders = Slider::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->limit(5);
        return view("frontend.home", compact('products', 'sliders', 'brands', 'categories'));
    }

    //  shop
    public function shop(){
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.shop', compact('products'));
    }

    //  single product
    public function singleProduct($id){
        $product = Product::find($id);
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->orderBy('id', 'desc')->get();
        return view('frontend.single_product',compact('product', 'related_products'));
    }

    //  cart
    public function cart(){
        return view("frontend.cart");
    }

    //  cart
    public function checkout(){
        return view("frontend.checkout");
    }


    public function dashboard(){
        return view('backend.dashboard');
    }



}
