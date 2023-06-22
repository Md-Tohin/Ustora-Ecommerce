@extends('frontend.front_layout')

@section('title')
    Cart page
@endsection

@section('cart-active')
    active
@endsection

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>

                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <tr class="cart_item">
                                                <td class="product-thumbnail">

                                                    <a href="{{url('single-product/'.$cart->product_id)}}">
                                                        @if (isset($cart->product->image) && file_exists($cart->product->image))
                                                        <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                                        src="{{ asset($cart->product->image) }}">
                                                        @else
                                                            <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                                            src="{{asset('assets/no-img.png')}}">
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="{{url('single-product/'.$cart->product_id)}}">{{$cart->product->name}}</a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">Tk. {{$cart->product->price}}</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <input type="button" class="minus" value="-">
                                                        <input type="number" size="4" class="input-text qty text"
                                                            title="Qty" value="{{$cart->quantity}}" min="0" step="1">
                                                        <input type="button" class="plus" value="+">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">Tk. {{$cart->product->price * $cart->quantity}}</span>
                                                </td>
                                                <td class="product-remove">
                                                    {{-- {{route('cart.product-delete', $cart->id)}} --}}
                                                    <a href="" title="Remove this item" class="remove" href="#">×</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value=""
                                                        id="coupon_code" class="input-text" name="coupon_code" style="width: 120px;">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon"
                                                        class="button">
                                                </div>
                                                <div class="" style="float: right;">
                                                    <input type="submit" value="Update Cart" name="update_cart" class="button">
                                                    <input type="submit" value="Checkout" name="proceed"
                                                    class="checkout-button button alt wc-forward">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">
                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>
                                    <table cellspacing="0">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">£15.00</span></td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>Free Shipping</td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">£15.00</span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
