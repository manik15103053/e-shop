@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection
@section('main-content')
<div class="py-3 shadow-sm p-3 mb-5  rounded bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection / {{ $category->name }}</h6>
    </div>
</div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $category->name }}</h2>
                    <div class="row">
                        @foreach ($products as $item)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('category-product-details', ['cat_slug' => $category->slug, 'pro_slug' => $item->slug]) }}">
                                    <div class="card">
                                        <img src="{{ asset($item->image) }}" alt="Category Name" height="250">
                                        <div class="card-body">
                                            <h5>{{ $item->name }}</h5>
                                            <span class="float-start">{{ $item->selling_price }}</span>
                                            <span class="float-end"><s>{{ $item->original_price }}</s> </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
