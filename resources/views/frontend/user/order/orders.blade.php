@extends('frontend.front_layout')

@section('title')
    Thanks page
@endsection

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>My Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('')}}" alt="Image">
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                      </ul>
                </div>
                <div class="col-md-8">

                </div>
            </div>
        </div>
    </div>
@endsection
