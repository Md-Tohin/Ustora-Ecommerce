<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //  order store
    public function orderStore(Request $request){
        // return $request->all();
        if ($request->payment_method == 'stripe') {
            
        }
        elseif ($request->payment_method == 'ssl') {
            
        }
        elseif ($request->payment_method == 'paypal') {
            
        }
        else{
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'state_id' => $request->state_id,
                'country' => $request->country,
                'postcode' => $request->postcode,
                'shipping_name' => $request->shipping_name,
                'shipping_email' => $request->shipping_email,
                'shipping_phone' => $request->shipping_phone,
                'shipping_address' => $request->shipping_address,
                'comments' => $request->comments,
                'payment_method' => 'Cash on Delivery',
                'payment_type' => '',
                'transaction_id' => 'TI'.mt_rand(10000000, 999999999),
                'currency' => '',
                'amount' => $request->total_amount,
                'order_number' => 'ORN'.mt_rand(10000000, 999999999),
                'invoice_no' => 'SPM'.mt_rand(10000000, 999999999),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'status' => 'Pending',
                'created_at' => Carbon::now(),
            ]);

            $carts = Cart::with('product')->where('user_id', Auth::id())->get();
            foreach($carts as $cart){
                OrderItem::insert([
                    'order_id' => $order_id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->product->price,
                    'qty' => $cart->quantity,
                    'created_at' => Carbon::now(),
                ]);
            }
            foreach($carts as $cart){
                Cart::findOrFail($cart->id)->delete();
            }
            $notification = array(
                'message' => 'Your order successfully Done.!',
                'alert-type' => 'success',
            );
            return redirect()->route('frontend.thanks')->with($notification);
        }
    }

    //  thanks
    public function thanks(){
        $top_categories = Category::where('is_top', 1)->orderBy('id', 'asc')->get();
        $notification = array(
            'message' => 'Your order successfully Done.!',
            'alert-type' => 'success',
        );
        return view('frontend.complete_order', compact('top_categories'))->with($notification);
    }
}
