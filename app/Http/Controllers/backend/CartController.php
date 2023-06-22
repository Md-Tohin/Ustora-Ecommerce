<?php

namespace App\Http\Controllers\backend;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //  view cart
    public function cart(){
        if (Auth::check()) {
            $top_categories = Category::where('is_top', 1)->orderBy('id', 'asc')->get();
            $carts = Cart::with('product')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
            return view("frontend.cart", compact('carts', 'top_categories'));
        }
        else{
            $notification = array(
                'message' => 'You are login First, then try again!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }   
    }

    //  store cart
    public function storeCart(Request $request){
        if (Auth::check()) {
            $exists = Cart::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
            if ($exists) {
                $notification = array(
                    'message' => 'This product has already taken!',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            } 
            else {
                $cart = new Cart;
                $cart->user_id = Auth::id();
                $cart->product_id = $request->product_id;
                $cart->quantity = $request->quantity;
                $cart->save();
                $notification = array(
                    'message' => 'Cart product inserted successfully!',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            $notification = array(
                'message' => 'You are login First, then try again!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }        
    }

    //  remove cart item
    public function removeCartItem($id){
        if (Auth::check()) {
            Cart::where('id', $id)->delete();
            $notification = array(
                'message' => 'Cart item deleted successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'You are login First, then try again!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }   
    }

    //  update cart
    public function cartUpdate(Request $request){

        foreach($request->product_id as $key => $value){
            $item = Cart::findOrFail($request->id[$key]);
            $item->product_id = $request->product_id[$key];
            $item->quantity = $request->quantity[$key];
            $item->user_id = Auth::id();
            $item->save();
        }
        $notification = array(
            'message' => 'Cart product updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


}
