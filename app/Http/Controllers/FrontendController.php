<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    //  home
    public function index(){
        $products = Product::orderBy('id', 'desc')->get();
        $top_categories = Category::where('is_top', 1)->orderBy('id', 'asc')->get();
        $sliders = Slider::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->limit(5);
        return view("frontend.home", compact('products', 'sliders', 'brands', 'categories', 'top_categories'));
    }

    //  shop
    public function shop(){
        $top_categories = Category::where('is_top', 1)->orderBy('id', 'asc')->get();
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.shop', compact('products', 'top_categories'));
    }

    //  single product
    public function singleProduct($id){
        $top_categories = Category::where('is_top', 1)->orderBy('id', 'asc')->get();
        $product = Product::find($id);
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->orderBy('id', 'desc')->get();
        return view('frontend.single_product',compact('product', 'related_products', 'top_categories'));
    }

    //  cart
    public function checkout(){
        $top_categories = Category::where('is_top', 1)->orderBy('id', 'asc')->get();
        $carts = Cart::with('product')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view("frontend.checkout", compact('carts', 'top_categories'));
    }


    public function dashboard(){
        return view('backend.dashboard');
    }



}
