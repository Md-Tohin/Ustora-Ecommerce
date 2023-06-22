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
                            <form action="{{ route('cart.update') }}" method="post">
                                @csrf                                
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
                                        @php
                                            $subTotal = 0;
                                        @endphp
                                        @foreach ($carts as $key => $cart)
                                            <input type="hidden" name="id[]" value="{{ $cart->id }}">
                                            <input type="hidden" name="product_id[]" value="{{ $cart->product_id }}">
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

                                                        <input type="number" class="input-text qty text"
                                                            title="Qty" name="quantity[]" class="quantityField" value="{{$cart->quantity}}" min="1">
                                                        <input type="button" class="plus" value="+">
                                                        {{-- <input type="button" id="minusBtn" class="minus" value="-">
                                                        <input type="number" class="input-text qty text"
                                                            title="Qty" id="quantityField" value="{{$cart->quantity}}" min="1" >
                                                        <input type="button" id="plusBtn" class="plus" value="+"> --}}
                                                    </div>
                                                </td>
                                                @php
                                                    $totalPrice = $cart->product->price * $cart->quantity;
                                                    $subTotal = $subTotal + $totalPrice;
                                                @endphp
                                                <td class="product-subtotal">
                                                    <span class="amount">Tk. {{ $totalPrice }}</span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="{{route('cart.item-delete', $cart->id)}}" title="Remove this item" class="remove" href="#">×</a>
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
                                                    <a href="{{ route('frontend.checkout') }}" class="checkout-button button alt wc-forward" style="background: #5a88ca; color: #fff; padding: 13px 20px; text-transform: uppercase; border: medium none;  text-decoration: none;">Checkout</a>
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
                                                <td><span class="amount">Tk. {{ $subTotal }}</span></td>
                                            </tr>
                                            @php
                                                $tax = $subTotal * 5 / 100;
                                                $grandTotal = $subTotal + $tax;
                                            @endphp
                                            <tr class="shipping">
                                                <th>Tax (5%)</th>
                                                <td>Tk. {{ $tax }}</td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Grand Total</th>
                                                <td><strong><span class="amount">Tk. {{ $grandTotal }}</span></strong> </td>
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

@section('page-script')
<script>
    let quantity = $('#quantityField').val();
    // $('#minusBtn').on('click', function(e){
    //     console.log(quantity);
    // });

    // $('#plusBtn').on('click', function(e){
    //     console.log(quantity);
    // });
    function minusBtn(qty){
        console.log(qty);
    }

    function plusBtn(){
        console.log(quantity);
    }
</script>
@endsection
