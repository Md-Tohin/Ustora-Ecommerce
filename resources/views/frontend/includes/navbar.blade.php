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

                    @foreach ($top_categories as $category)
                        <li class="@yield('category-{{ $category->id }}')"><a href="">{{ $category->name }}</a></li>
                    @endforeach

                    <li class=""><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
