@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 mb-3">{{ __('Orders') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title" style="line-height: 36px;">{{ __('New Order') }}</h5>
                                <a href="{{ route('admin.order') }}"
                                            class="btn bg-primary float-right d-flex align-items-center justify-content-center mr-1 text-white">
                                            <i class="fas fa-plus"></i>
                                            {{ __('Back') }}
                                        </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table id="dataTables" class="table table-hover text-nowrap jsgrid-table">
                                <thead>
                                    <tr class="text-center">
                                        <td>Sl</td>
                                        <td>Tracking Number</td>
                                        <td>Total Price</td>
                                        <td>Status</td>
                                        <td>Date</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key=> $order)
                                        <tr class="text-center">
                                            <td>{{ $key + 1}}</td>
                                            <td class="text-left">{{ $order->tracking_no }}</td>
                                            <td>{{ $order->total_price }}</td>
                                            <td>
                                                @if ($order->status == '1')
                                                    <span class="badge bg-success">Complete</span>
                                                @else
                                                <span class="badge bg-warning">Pending</span>    
                                                @endif
                                            </td>
                                            <td>{{ date('d M Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.order-view', $order->id) }}" class="btn btn-info btn-sm">View</a>
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
    </div>
</div>
@endsection
