@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 mb-3">{{ __('Order Details') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-success">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title text-white" style="line-height: 36px; ">{{ __('Order Details') }}</h5>
                                <a href="{{ route('admin.order') }}"
                                            class="btn bg-primary float-right d-flex align-items-center justify-content-center mr-1 text-white">
                                            <i class="fas fa-plus"></i>
                                            {{ __('Back') }}
                                        </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Shipping Details</h6>
                                    
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
                                    <h6>Order Details</h6>
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
                                    <div class="mt-3 px-4">
                                        <form action="{{ route('admin.order-status', $order->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Order Status</label>
                                                <select name="status" id="status" class="form-control form-select">
                                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Complete</option>
                                                    <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Pending</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn btn-info btn-sm float-end">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
