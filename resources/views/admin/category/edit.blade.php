
@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 mb-3">{{ __('Categories') }}</h3>
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
                                <h5 class="card-title" style="line-height: 36px;">{{ __('Category Update') }}</h5>
                                <div>
                                    {{-- @if (userCan('city.create')) --}}
                                        <a href="{{ route('category.index') }}"
                                            class="btn bg-primary float-right d-flex align-items-center justify-content-center mr-1 text-white">
                                            <i class="fa fa-long-arrow-right"></i>
                                            {{ __('Back') }}
                                        </a>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="name">Category Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Category name" value="{{ $category->name ?? old('name') }}" required>
                                            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" name="slug" placeholder="Enter slug" value="{{ $category->slug ??  old('slug') }}" required>
                                            <span class="text-danger">@error('slug'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" name="image" placeholder="Enter image" >
                                            <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                                            <img src="{{ asset($category->image) }}" alt="Category Image" class="mt-3 mb-2" width="65px" height="55px">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title" value="{{ $category->meta_title ?? old('meta_title') }}" required>
                                            <span class="text-danger">@error('meta_title'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="meta_description">Status</label>
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" name="status" {{ $category->status == "1" ? 'checked' : '' }} type="checkbox" id="flexSwitchCheckDefault" >
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="meta_description">Is Popular</label>
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" name="popular" type="checkbox" {{ $category->popular == "1" ? 'checked' : '' }} id="flexSwitchCheckDefault" >
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="meta_keywords">Meta keywords</label>
                                            <input type="text" class="form-control" name="meta_keywords" placeholder="Enter Meta keywords" value="{{ $category->meta_keywords ??  old('meta_keywords') }}" required>
                                            <span class="text-danger">@error('meta_keywords'){{ $message }}@enderror</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="meta_description">Meta Description</label>
                                            <textarea name="meta_description" id="" cols="30" rows="2" class="form-control" placeholder="Meta Description.."> {{  $category->meta_description }}</textarea>
                                            <span class="text-danger">@error('meta_description'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Enter Description..">{{  $category->description }}</textarea>
                                            <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-info">Update</button>
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
