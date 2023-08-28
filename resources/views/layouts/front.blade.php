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
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

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
<script src="{{ asset('frontend/js/jquery-3.7.0.min.js') }}" ></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('status'))
   <script>
        swal({
    title: "Success!",
    text: "{{ session('status') }}",
    icon: "success",
    });
   </script>
@endif
@stack('js')
</body>
</html>
