@extends('layouts.front')

@section('title')
User Wishlist
@endsection
@section('main-content')
<div class="py-3 shadow-sm p-3 mb-5  rounded bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ route('index') }}">
                Home
            </a>
             /
             <a href="{{ route('view-wishlist') }}">
                Wishlist
            </a>

         </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body wishlists">
            @if ($wishlists->count() > 0)
            @foreach($wishlists as $item)
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{ asset($item->product->image) }}" alt="Product Image" height="55px">
                </div>
                <div class="col-md-2 my-auto">
                    <h6> {{ $item->product->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6 data-price="{{ $item->product->selling_price }}">Rs {{ $item->product->selling_price }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        <label for="quantity">Quantity</label>
                        <div class="input-group  mb-3" style="width: 130px">
                            <button class="input-group-text  decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control text-center qty-input quantity" value="1">
                            <button class="input-group-text  increment-btn">+</button>
                        </div>
                   
                </div>
                <br>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-success btn-sm addToCartBtn"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
                <br>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger btn-sm removeWishlist"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>
            @endforeach
             @else
             <h4>There are no products in your Wishlists</h4>   
            @endif
        </div>
    </div>
</div>
@endsection