<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <!-----Carousel ----->
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!------google font----->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Roboto+Serif:opsz@8..144&family=Slabo+27px&family=Yesteryear&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


    <style>
        a{
            text-decoration: none !important;
            /* color: black !important */
        }
    </style>
    @stack('css')


</head>
<body>
    @include('frontend.inc.navbar')
    <div class="content">
        @yield('main-content')
    </div>
    <div id="custom-toast-container" style="position: fixed; bottom: 0; left: 0;"></div>

<script src="{{ asset('frontend/js/jquery-3.7.0.min.js') }}" ></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>
<script src="{{ asset('frontend/js/custom.js') }}" ></script>
<script src="{{ asset('frontend/js/checkout.js') }}" ></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div id="custom-toast-container" style="position: fixed; bottom: 0; left: 0;"></div>
<script>
 
    var availableTags = [];
    $.ajax({
        type: "get",
        url: "/product-list",
        success: function (response) {
            startAutoComplete(response);
        } 
    });

    function startAutoComplete(availableTags){

        $( "#serch_product" ).autocomplete({
            source: availableTags
        });
    }
   

  </script>
@if (Session::has('success'))
<script>
    toastr.options = {
        'progressBar': true,
        'closeButton': true,
        'timeout': 120000, // Adjust the timeout as needed
    };
    toastr.success("{{ Session::get('success') }}", 'Success!');
</script>
@elseif (Session::has('error'))
<script>
    toastr.options = {
        'progressBar': true,
        'closeButton': true,
        'timeout': 120000, // Adjust the timeout as needed
    };
    toastr.error("{{ Session::get('error') }}", 'Error!');
</script>
@endif



@stack('js')
</body>
</html>
