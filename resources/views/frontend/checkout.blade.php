@extends('frontend.front_layout')

@section('title')
Checkout page
@endsection

@section('checkout-active')
active
@endsection

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10 offset-md-1">
                <div class="product-content-right">
                    <div class="woocommerce">

                        <div class="woocommerce-info">Have a coupon? <a class="showcoupon" data-toggle="collapse"
                                href="#coupon-collapse-wrap" aria-expanded="false"
                                aria-controls="coupon-collapse-wrap">Click here to enter your code</a>
                        </div>

                        <form id="coupon-collapse-wrap" method="post" class="checkout_coupon collapse">

                            <p class="form-row form-row-first">
                                <input type="text" value="" id="coupon_code" placeholder="Coupon code"
                                    class="input-text" name="coupon_code">
                            </p>

                            <p class="form-row form-row-last">
                                <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                            </p>

                            <div class="clear"></div>
                        </form>
                        <br>


                        <form action="{{ route('order.store') }}" class="checkout" method="post" name="checkout">
                            @csrf
                            <div id="customer_details" class="col2-set">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="col-2">
                                            <div class="woocommerce-shipping-fields">
                                                <h3 id="ship-to-different-address" style="margin-bottom: 35px;">
                                                    <label class="checkbox"
                                                        for="ship-to-different-address-checkbox">Shipping
                                                        address</label>
                                                </h3>
                                                <div class="shipping_address" style="display: block;">

                                                    <p id="shipping_name_field"
                                                        class="form-row form-row-first validate-required">
                                                        <label class="" for="shipping_name">Name <abbr title="required"
                                                                class="required">*</abbr>
                                                        </label>
                                                        <input type="text" value="" id="shipping_name" name="name"
                                                            class="input-text" placeholder="Name">
                                                    </p>

                                                    <p id="shipping_email_name_field"
                                                        class="form-row form-row-last validate-required">
                                                        <label class="" for="shipping_email_name">Email Address<abbr
                                                                title="required" class="required">*</abbr>
                                                        </label>
                                                        <input type="text" value="" id="shipping_email_name"
                                                            name="email" class="input-text" placeholder="Email">
                                                    </p>
                                                    <div class="clear"></div>

                                                    <p id="shipping_phone_field" class="form-row form-row-wide">
                                                        <label class="" for="shipping_phone">Phone</label>
                                                        <input type="text" value="" placeholder="Phone"
                                                            id="shipping_phone" name="phone" class="input-text ">
                                                    </p>

                                                    <p id="shipping_address_1_field"
                                                        class="form-row form-row-wide address-field validate-required">
                                                        <label class="" for="shipping_address_1">Address <abbr
                                                                title="required" class="required">*</abbr>
                                                        </label>
                                                        <input type="text" value="" placeholder="Street address"
                                                            id="shipping_address_1" name="address"
                                                            class="input-text ">
                                                    </p>
                                                    <div class="clear"></div>
                                                </div>
                                                <p id="order_comments_field" class="form-row notes">
                                                    <label class="" for="order_comments">Order Notes</label>
                                                    <textarea cols="5" rows="2"
                                                        placeholder="Notes about your order, e.g. special notes for delivery."
                                                        id="order_comments" class="input-text "
                                                        name="comments"></textarea>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3 style="margin-bottom: 50px;"></h3>

                                                <p id="billing_division_field"
                                                    class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                    <label class="" for="billing_division">Division <abbr
                                                            title="required" class="required">*</abbr>
                                                    </label>
                                                    <select class="country_to_state country_select"
                                                        id="billing_division" name="division_id">
                                                        <option value="">Select a Division</option>
                                                        <option value="1">Dhaka</option>
                                                        <option value="2">Commila</option>
                                                        <option value="3">Chittagong</option>
                                                        <option value="4">Khulna</option>
                                                    </select>
                                                </p>

                                                <p id="billing_district_field"
                                                    class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                    <label class="" for="billing_district">District <abbr
                                                            title="required" class="required">*</abbr>
                                                    </label>
                                                    <select class="country_to_state country_select"
                                                        id="billing_district" name="district_id">
                                                        <option value="">Select a District</option>
                                                        <option value="1">Jamalpur</option>
                                                        <option value="2">Sripur</option>
                                                        <option value="3">Uttara</option>
                                                        <option value="4">Gazipur</option>
                                                    </select>
                                                </p>

                                                <p id="billing_state_field"
                                                    class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                    <label class="" for="billing_state">State <abbr title="required"
                                                            class="required">*</abbr>
                                                    </label>
                                                    <select class="country_to_state country_select" id="billing_state"
                                                        name="state_id">
                                                        <option value="">Select a State</option>
                                                        <option value="1">Madargonj</option>
                                                        <option value="2">Jamalpur Sadar</option>
                                                    </select>
                                                </p>

                                                <p id="billing_country_field"
                                                    class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                    <label class="" for="billing_country">Country <abbr title="required"
                                                            class="required">*</abbr>
                                                    </label>
                                                    <select class="country_to_state country_select" id="billing_country"
                                                        name="country">
                                                        <option value="">Select a country…</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="PW">Belau</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia</option>
                                                        <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BV">Bouvet Island</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="VG">British Virgin Islands</option>
                                                        <option value="BN">Brunei</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option>
                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo (Brazzaville)</option>
                                                        <option value="CD">Congo (Kinshasa)</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">CuraÇao</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="TF">French Southern Territories</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HM">Heard Island and McDonald Islands</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="CI">Ivory Coast</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Laos</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macao S.A.R., China</option>
                                                        <option value="MK">Macedonia</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia</option>
                                                        <option value="MD">Moldova</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="AN">Netherlands Antilles</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="KP">North Korea</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PS">Palestinian Territory</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="IE">Republic of Ireland</option>
                                                        <option value="RE">Reunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russia</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="ST">São Tomé and Príncipe</option>
                                                        <option value="BL">Saint Barthélemy</option>
                                                        <option value="SH">Saint Helena</option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="SX">Saint Martin (Dutch part)</option>
                                                        <option value="MF">Saint Martin (French part)</option>
                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="GS">South Georgia/Sandwich Islands</option>
                                                        <option value="KR">South Korea</option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syria</option>
                                                        <option value="TW">Taiwan</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TL">Timor-Leste</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks and Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option selected="selected" value="GB">United Kingdom (UK)
                                                        </option>
                                                        <option value="US">United States (US)</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VA">Vatican</option>
                                                        <option value="VE">Venezuela</option>
                                                        <option value="VN">Vietnam</option>
                                                        <option value="WF">Wallis and Futuna</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="WS">Western Samoa</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </p>

                                                <p id="billing_postcode_field"
                                                    class="form-row form-row-last address-field validate-required validate-postcode"
                                                    data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                                    <label class="" for="billing_postcode">Postcode <abbr
                                                            title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="" placeholder="Postcode / Zip"
                                                        id="billing_postcode" name="postcode"
                                                        class="input-text">
                                                </p>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3 id="order_review_heading"
                                style="text-align: center; margin-top: 20px; margin-bottom: 25px; font-weight: 700">Your
                                order</h3>

                            <div id="order_review" style="position: relative;">
                                <table class="shop_table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $subTotal = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                @if (isset($cart->product->image) && file_exists($cart->product->image))
                                                <img width="45px" height="30px;" style="margin-right: 12px;" alt="img"
                                                    class="shop_thumbnail" src="{{ asset($cart->product->image) }}">
                                                @else
                                                <img width="45px" height="30px" alt="img" class="shop_thumbnail"
                                                    style="margin-right: 12px;" src="{{asset('assets/no-img.png')}}">
                                                @endif
                                                {{$cart->product->name}} &nbsp; ({{ $cart->product->price }}<strong
                                                    class="product-quantity">× {{ $cart->quantity }})</strong>
                                            </td>
                                            @php
                                            $totalPrice = $cart->product->price * $cart->quantity;
                                            $subTotal = $subTotal + $totalPrice;
                                            @endphp
                                            <td class="product-total">
                                                <span class="amount">Tk. {{ $totalPrice }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">Tk. {{ $subTotal }}</span>
                                            </td>
                                        </tr>
                                        @php
                                        $tax = $subTotal * 5 / 100;
                                        $grandTotal = $subTotal + $tax;
                                        @endphp
                                        <tr class="shipping">
                                            <th>Tax (5%)</th>
                                            <td>
                                                Tk. {{ $tax }}
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Grand Total</th>
                                            <td><strong><span class="amount">Tk. {{ $grandTotal }}</span></strong> </td>
                                        </tr>

                                    </tfoot>
                                </table>
                                <div id="payment">
                                    <ul class="payment_methods methods">

                                        <li class="payment_method_cheque">
                                            <input type="radio" data-order_button_text="" checked="checked" name="payment_method" class="input-radio" id="payment_method_cheque" value="cod">
                                            <label for="payment_method_cheque">Cash on Delivery </label>
                                        </li>

                                        <li class="payment_method_bacs">
                                            <input type="radio" data-order_button_text="" value="stripe"
                                                name="payment_method" class="input-radio" id="payment_method_bacs">
                                            <label for="payment_method_bacs">Direct Bank Transfer </label>
                                        </li>
                                        
                                        <li class="payment_method_paypal">
                                            <input type="radio" data-order_button_text="Proceed to PayPal"
                                                value="paypal" name="payment_method" class="input-radio"
                                                id="payment_method_paypal">
                                            <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark"
                                                    src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png">
                                            </label>
                                        </li>
                                    </ul>
                                    <div class="form-row place-order">
                                        <input type="submit" data-value="Place order" value="Place order"
                                            id="place_order" name="btn" class="button alt">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection