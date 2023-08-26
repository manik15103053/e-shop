<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('admin') }}/img/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('layouts.inc.styles')
    @stack('css')

</head>
<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <span class="ms-1 font-weight-bold text-white">E-Shop</span>
          </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        @include('layouts.inc.sidebar')

      </aside>
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.inc.navbar')
        <!-- End Navbar -->
        @yield('main-content')
      </main>
      @include('layouts.inc.plagin')

@include('layouts.inc.scripts')
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
