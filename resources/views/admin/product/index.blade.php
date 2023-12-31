@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 mb-3">{{ __('Products') }}</h3>
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
                                <h5 class="card-title" style="line-height: 36px;">{{ __('Product list') }}</h5>
                                <div>
                                    {{-- @if (userCan('city.create')) --}}
                                        <a href="{{ route('product.create') }}"
                                            class="btn bg-primary float-right d-flex align-items-center justify-content-center mr-1 text-white">
                                            <i class="fas fa-plus"></i>
                                            {{ __('Add New') }}
                                        </a>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">

                            <table id="dataTables" class="table table-hover text-nowrap jsgrid-table">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10%">{{ __('SL') }}</th>
                                        <th width="10%">{{ __('Image') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('trending') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key=> $item)
                                        <tr class="text-center">
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->image) }}" alt="" width="65px" height="60px">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->original_price }}</td>
                                            <td>
                                                @if($item->status == 1)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->trending == 1)
                                                <span class="badge bg-info">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <a href="{{ route('product.delete', $item->id) }}" onclick="return confirm('Are you sure you went to delete this item')" class="btn btn-danger btn-sm">Delete</a>
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
