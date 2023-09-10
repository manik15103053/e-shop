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
    <div class="card  shadow p-3 mb-5 bg-white rounded ">
        @if ($cartItems->count() > 0)
        <div class="card-body cartItems">
            @foreach($cartItems as $item)
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{ asset($item->product->image) }}" alt="Product Image" height="55px">
                </div>
                <div class="col-md-3 my-auto">
                    <h6> {{ $item->product->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6 data-price="{{ $item->product->selling_price }}">Rs {{ $item->product->selling_price }}</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if ($item->product->qty >= $item->prod_qty)
                        <label for="quantity">Quantity</label>
                        <div class="input-group  mb-3" style="width: 130px">
                            <button class="input-group-text changeQty decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control text-center qty-input quantity" value="{{ $item->prod_qty }}">
                            <button class="input-group-text changeQty increment-btn">+</button>
                        </div>
                    @else
                        <h6>Out of Stock</h6>
                   @endif
                </div>
                <br>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger btn-sm delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div id="total" class="float-left">Total: Rs 0.00</div>
            <a href="{{ route('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
            </div>

        </div>
        @else
           <div class="card-body text-center">
                <h2>Your <i class="fa fa-shopping-cart"></i>Cart is empty</h2>
                <a href="{{ route('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
           </div>
        @endif
    </div>
</div>
@endsection



