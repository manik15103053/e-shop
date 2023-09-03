@extends('layouts.front')

@section('title')
My Order
@endsection
@section('main-content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>My Order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Sl</td>
                                    <td>Tracking Number</td>
                                    <td>Total Price</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key=> $order)
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                        <td>{{ $order->tracking_no }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>
                                            @if ($order->status == '1')
                                                <span class="badge bg-success">Complete</span>
                                            @else
                                            <span class="badge bg-warning">Pending</span>    
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('order-details', $order->id) }}" class="btn btn-info btn-sm">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection