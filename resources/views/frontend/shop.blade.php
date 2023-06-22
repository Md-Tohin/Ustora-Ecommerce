@extends('frontend.front_layout')

@section('title')
    Shop page
@endsection

@section('shop-active')
    active
@endsection

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

            @foreach ($products as $product)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            @if (isset($product->image) && file_exists($product->image))
                                <img src="{{asset($product->image)}}" style="height: 250px; padding: 15px;" alt="">
                            @else
                                <img src="{{asset('assets/no-img.png')}}" style="height: 250px;" alt="">
                            @endif
                        </div>
                        <h2><a href="{{url('single-product/'.$product->id)}}">{{$product->name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>Tk. {{$product->price}}</ins> <del></del>
                        </div>

                        <div class="product-option-shop">
                            <a onclick="addToCart()" quantity="1" product_id="70"
                             href="" class="add_to_cart_button" >Add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //  add to cart
        function addToCart(e){
            e.preventDefault();
            let product_id = $(this).attr('product_id');
            let qty = $(this).attr('quantity');
            console.log(product_id);
        }
    </script>
    
@endsection
