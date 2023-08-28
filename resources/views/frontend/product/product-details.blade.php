@extends('layouts.front')

@section('title', $product->name)

@section('main-content')
    <div class="py-3 shadow-sm p-3 mb-5  rounded bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collection / {{ $product->category->name }} / {{ $product->name }}</h6>
        </div>
    </div>
    <div class="container mt-2">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset($product->image) }}" alt="Product Image" height="250px">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            @if ($product->trending == 1)
                                <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original Price : <s>Rs {{ $product->original_price }}</s></label>
                        <label class="fw-bold">Selling Price : Rs {{ $product->selling_price }}</label>
                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>
                        <hr>
                        @if ($product->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                        <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <label for="quantity">Quantity</label>
                                <div class="input-group  mb-3">
                                    <span class="input-group-text">-</span>
                                    <input type="text" name="quantity" class="form-control text-center" value="1">
                                    <span class="input-group-text">+</span>
                                  </div>
                            </div>
                            <div class="col-md-9">
                                <br/>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist</button>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
