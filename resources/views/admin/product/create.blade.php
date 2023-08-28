@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 mb-3">{{ __('Product') }}</h3>
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
                                <h5 class="card-title" style="line-height: 36px;">{{ __('Product Create') }}</h5>
                                <div>
                                    {{-- @if (userCan('city.create')) --}}
                                        <a href="{{ route('product.index') }}"
                                            class="btn bg-primary float-right d-flex align-items-center justify-content-center mr-1 text-white">
                                            <i class="fa fa-long-arrow-right"></i>
                                            {{ __('Back') }}
                                        </a>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="cat_id">Category</label>
                                            <select name="cat_id" id="cat_id" class="form-control form-select" required>
                                                <option value="" hidden>Select Category</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('cat_id'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}" required>
                                            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" name="slug" placeholder="Enter Slug" value="{{ old('slug') }}" required>
                                            <span class="text-danger">@error('slug'){{ $message }}@enderror</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" name="image" placeholder="Enter image" value="{{ old('image') }}" required>
                                            <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="original_price">Original Price</label>
                                            <input type="number" class="form-control" name="original_price" placeholder="Enter Original Price" value="{{ old('original_price') }}" required>
                                            <span class="text-danger">@error('original_price'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="selling_price">Selling Price</label>
                                            <input type="number" class="form-control" name="selling_price" placeholder="Enter Selling Price" value="{{ old('selling_price') }}" required>
                                            <span class="text-danger">@error('selling_price'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="qty">QTY</label>
                                            <input type="number" class="form-control" name="qty" placeholder="Enter Selling Price" value="{{ old('qty') }}" required>
                                            <span class="text-danger">@error('qty'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="tax">Tax</label>
                                            <input type="number" class="form-control" name="tax" placeholder="Enter Tax" value="{{ old('tax') }}" required>
                                            <span class="text-danger">@error('tax'){{ $message }}@enderror</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="meta_description">Status</label>
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" name="status" type="checkbox" id="flexSwitchCheckDefault" >
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="meta_description">Trending</label>
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" name="trending" type="checkbox" id="flexSwitchCheckDefault" >
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title" value="{{ old('meta_title') }}" required>
                                            <span class="text-danger">@error('meta_title'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="meta_keyword">Meta keywords</label>
                                            <input type="text" class="form-control" name="meta_keyword" placeholder="Enter Meta keywords" value="{{ old('meta_keyword') }}" required>
                                            <span class="text-danger">@error('meta_keyword'){{ $message }}@enderror</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="meta_description">Meta Description</label>
                                            <textarea name="meta_description" id="" cols="30" rows="2" class="form-control" placeholder="Meta Description..">{{ old('meta_description') }}</textarea>
                                            <span class="text-danger">@error('meta_description'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="small_description">Small Description</label>
                                            <textarea name="small_description" id="" cols="30" rows="2" class="form-control" placeholder="Small Description..">{{ old('small_description') }}</textarea>
                                            <span class="text-danger">@error('small_description'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Enter Description..">{{ old('description') }}</textarea>
                                            <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-info">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
