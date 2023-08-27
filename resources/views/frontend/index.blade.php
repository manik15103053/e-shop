@extends('layouts.front')

@section('title')
E-Shop
@endsection
@section('main-content')
@include('frontend.inc.slider')
<div class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($products as $item )
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset($item->product) }}" alt="Product Image">
                    <div class="card-body">
                        <h5>{{ $item->name }}</h5>
                        <small>{{ $item->selling_price }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
