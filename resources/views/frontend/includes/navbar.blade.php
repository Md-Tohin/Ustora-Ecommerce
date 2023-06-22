<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="@yield('home-active')"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="@yield('shop-active')"><a href="{{ route('frontend.shop') }}">Shop page</a></li>
                    <li class="@yield('single-product-active')"><a href="">Single product</a></li>
                    <li class="@yield('cart-active')"><a href="{{ route('frontend.cart') }}">Cart</a></li>
                    <li class="@yield('checkout-active')"><a href="{{ route('frontend.checkout') }}">Checkout</a></li>
                    <li class=""><a href="#">Category</a></li>
                    <li class=""><a href="#">Others</a></li>
                    <li class=""><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
