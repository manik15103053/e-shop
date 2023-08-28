@extends('layouts.front')

@section('title')
Category
@endsection
@section('main-content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Category</h2>
                    <div class="row">
                        @foreach ($categories as $item)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('category-product', $item->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset($item->image) }}" alt="Category Name" height="250">
                                        <div class="card-body">
                                            <h5>{{ $item->name }}</h5>
                                            <p>{{ $item->description }}</p>
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
