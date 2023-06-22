<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //  store cart
    public function storeCart(Request $request){
        $cart = new Cart;
        $cart->user_id = Auth::id();
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->save();
        $notification = array(
            'message' => 'Cart product inserted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
