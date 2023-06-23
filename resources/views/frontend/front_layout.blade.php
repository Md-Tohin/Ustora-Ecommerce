<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/style.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">


</head>

<body>

    @include('frontend.includes.header')

    @yield('content')

    @include('frontend.includes.footer')

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="{{ asset('assets/common/form-validator/jquery.form-validator.min.js') }}"></script>
    <script>
        $.validate({
            lang: 'en'
        })
    </script>
    
    <!-- jQuery sticky menu -->
    <script src="{{ asset('assets/frontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="{{ asset('assets/frontend') }}/js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="{{ asset('assets/frontend') }}/js/main.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/bxslider.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/script.slider.js"></script>


    <!-- Main Script -->
    <script src="{{ asset('assets/frontend') }}/js/custom.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    @yield('page-script')

<script>
    //  add to cart
    function addToCart(){
        // let product_id = $('#product_price').text();
        let product_id = $('#product_id').val();
        let quantity = $('#quantity').val();
        console.log(quantity);

        // let product_id = $(this).attr('product_id');
        // let qty = $(this).attr('quantity');
        // console.log(product_id);
    }
</script>
</body>

</html>
