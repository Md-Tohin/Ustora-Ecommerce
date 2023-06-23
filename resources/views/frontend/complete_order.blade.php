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
                    <h2>Thanks Page</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>

    <style>        
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");body{background-color: #eee;font-family: "Poppins", sans-serif;font-weight: 300}.cart{}.progresses{display: flex;align-items: center}.line{width: 76px;height: 6px;background: #63d19e}.steps{display: flex;background-color: #63d19e;color: #fff;font-size: 12px;width: 30px;height: 30px;align-items: center;justify-content: center;border-radius: 50%}.check1{display: flex;background-color: #63d19e;color: #fff;font-size: 17px;width: 60px;height: 60px;align-items: center;justify-content: center;border-radius: 50%;margin-bottom: 10px}.invoice-link{font-size: 15px}.order-button{height: 50px}.background-muted{background-color:#fafafc}

        .order-confirm{
            display: flex;
            justify-content:  center;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
            font-family: Poppins;
        }
        .order-button{
            height: 50px
        }
        .invoice-link{
            font-size: 15px
        }
    </style>

    <div class="container mt-4 mb-4">
        <div class="row d-flex cart align-items-center justify-content-center">
            <div class="col-md-10">
                <div class="card">                    
                    <div class="row g-0">
                        <div class="col-md-4"></div>
                        <div class="col-md-6 border-right p-5">
                            <div class="text-center order-details">
                                <div class="order-confirm"> <span
                                        class="check1"><i class="fa fa-check"></i></span> <span
                                        class="font-weight-bold" style="font-weight: 700; font-size: 20px">Order Confirmed</span> <small class="mt-2" style="margin-top: 8px; margin-bottom: 5px; font-size: 14px; font-family: Poppins;">Your
                                        illustraion will go to you soon</small> <a href="#"
                                        class="text-decoration-none invoice-link">View Invoice</a> </div> <button
                                    class="btn btn-danger btn-block order-button">Go to your Order</button>
                            </div>
                        </div>
                      
                    </div>
                    <div> </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection