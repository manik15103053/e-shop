@extends('layouts.front')

@section('title')
Order Details
@endsection
@section('main-content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>View Order Details
                            <a href="{{ route('my-order') }}" class="btn btn-warning text-white float-end btn-sm">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Shipping Details</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="" >First name</label>
                                    <div class="border p-2 mb-3">{{ $order->fname }}</div>
                                    <label for="">Last name</label>
                                    <div class="border p-2 mb-3">{{ $order->lname }}</div>
                                    <label for="">Email</label>
                                    <div class="border p-2 mb-3">{{ $order->email }}</div>
                                    <label for="">Phone</label>
                                    <div class="border p-2 mb-3">{{ $order->phone }}</div>
                                    <label for="">Shipping address</label>
                                    <div class="border p-2 mb-3">
                                        {{ $order->address1 }} <br>
                                        {{ $order->address2 }} <br>
                                        {{ $order->city }} <br>
                                        {{ $order->state }} <br>
                                        {{ $order->country }} <br>
                                    </div>
                                    <label for="">Zip code</label>
                                    <div class="border p-2">{{ $order->pincode }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Quantity</td>
                                            <td>Price</td>
                                            <td>Image</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderItems as  $item)
                                           
                                            <tr>
                                                <td>{{ $item->product->name ?? "" }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset($item->product->image) ?? "" }}" alt="Product Image" width="55px">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5 class="p-2">Grand Total: <span class="float-end">{{ $order->total_price }}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection