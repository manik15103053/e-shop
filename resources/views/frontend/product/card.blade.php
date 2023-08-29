@extends('layouts.front')

@section('title')
 My Cart
@endsection
@section('main-content')
<div class="py-3 shadow-sm p-3 mb-5  rounded bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ route('index') }}">
                Home
            </a>
             /
             <a href="{{ route('cart-details') }}">
                Cart
            </a>

         </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card  shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
            @php
                $total = 0;
            @endphp
            @foreach($cartItems as $item)
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{ asset($item->product->image) }}" alt="Product Image" height="55px">
                </div>
                <div class="col-md-3 my-auto">
                    <h6> {{ $item->product->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>Rs {{ $item->product->selling_price }}</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    <label for="quantity">Quantity</label>
                    <div class="input-group  mb-3" style="width: 130px">
                        <button class="input-group-text changeQty decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control text-center qty-input" value="{{ $item->prod_qty }}">
                        <button class="input-group-text changeQty increment-btn">+</button>
                      </div>
                </div>
                <br>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger btn-sm delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>
                @php
                    $total += $item->product->selling_price * $item->prod_qty;
                @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h6> Total Price Rs: {{ $total }}
                <button class="btn btn-outline-success float-end">Proceed to Checkout</button>
            </h6>
        </div>
    </div>
</div>
@endsection



