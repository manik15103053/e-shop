@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 mb-3">{{ __('Users') }}</h3>
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
                                <h5 class="card-title" style="line-height: 36px;">{{ __('All Users') }}</h5>
                                {{-- <a href="{{ route('order-history') }}"
                                            class="btn bg-primary float-right d-flex align-items-center justify-content-center mr-1 text-white">
                                            {{ __('Order History') }}
                                        </a> --}}
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table id="dataTables" class="table table-hover text-nowrap jsgrid-table">
                                <thead>
                                    <tr class="text-center">
                                        <td>Sl</td>
                                        <td>Role</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Date</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key=> $item)
                                        <tr class="text-center">
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $item->role_as == 0 ? 'User' : 'In Admin' }}</td>
                                            <td class="text-left">{{ $item->name. ''.$item->lname }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            
                                            <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm">View</a>
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
