@extends('layouts.front')

@section('title')
E-Shop
@endsection
@section('main-content')
@include('frontend.inc.slider')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Product</h2>
            <div class="owl-carousel feature-carousel owl-theme">
                @foreach ($products as $item )
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset($item->image) }}" alt="Product Image"  height="250px">
                            <div class="card-body">
                                <h5>{{ $item->name }}</h5>
                                <span class="float-start">{{ $item->selling_price }}</span>
                                <span class="float-end"><s>{{ $item->original_price }}</s> </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $('.feature-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endpush
