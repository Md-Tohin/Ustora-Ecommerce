@extends('frontend.front_layout')

@section('title')
    Single product page
@endsection

@section('single-product-active')
    active
@endsection

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Single Product Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('assets/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">{{$product->name}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('assets/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">{{$product->name}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('assets/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('assets/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Category Name</a>
                            <a href="">{{$product->name}}</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        @if (isset($product->image) && file_exists($product->image))
                                            <img src="{{asset($product->image)}}" alt="">
                                        @else
                                            <img src="{{asset('assets/no-img.png')}}" alt="">
                                        @endif
                                    </div>

                                    <div class="product-gallery">
                                        <img src="{{asset($product->image)}}" alt="">
                                        <img src="{{asset($product->image)}}" alt="">
                                        <img src="{{asset($product->image)}}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$product->name}}</h2>
                                    <div class="product-inner-price">
                                        <ins>Tk. {{$product->price}}</ins> <del></del>
                                    </div>

                                    <form action="{{route('cart.store')}}" class="cart" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty"
                                                value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>

                                    <div class="product-inner-category">
                                        <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a
                                                href="">best</a>, <a href="">sale</a>, <a
                                                href="">shoes</a>. </p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                    role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile"
                                                    role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>
                                                <p>{!! $product->long_desc !!}</p>

                                                <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex.
                                                    Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis.
                                                    In malesuada pulvinar neque a consectetur. Nunc aliquam gravida
                                                    purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name"
                                                            type="text">
                                                    </p>
                                                    <p><label for="email">Email</label> <input name="email"
                                                            type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label>
                                                        <textarea name="review" id="" cols="30" rows="10"></textarea>
                                                    </p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                @foreach ($related_products as $item)
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            @if (isset($item->image) && file_exists($item->image))
                                                <img src="{{asset($item->image)}}" style="height: 250px; padding: 15px;" alt="">
                                            @else
                                                <img src="{{asset('assets/no-img.png')}}" style="height: 250px;" alt="">
                                            @endif

                                            <div class="product-hover">
                                                <a href="" class="add-to-cart-link"><i
                                                        class="fa fa-shopping-cart"></i> Add
                                                    to cart</a>
                                                <a href="{{url('single-product/'.$item->id)}}" class="view-details-link"><i class="fa fa-link"></i> See
                                                    details</a>
                                            </div>
                                        </div>

                                        <h2><a href="">{{$item->name}}</a></h2>

                                        <div class="product-carousel-price">
                                            <ins>Tk. {{$item->price}}</ins> <del></del>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
