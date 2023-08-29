@extends('layouts.front')

@section('title', $product->name)

@section('main-content')
    <div class="py-3 shadow-sm p-3 mb-5  rounded bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ route('category') }}">
                    Collection
                </a>
                 / 
                 <a href="{{ route('category', $product->category->slug) }}">
                    {{ $product->category->name }}
                </a>
                  / 
                  <a href="{{ route('category',[$product->category->slug,  $product->slug]) }}">
                    {{ $product->name }}
                </a>
             </h6>
        </div>
    </div>
    <div class="container mt-2">
        <div class="card product_data shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset($product->image) }}" alt="Product Image" height="250px">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            @if ($product->trending == 1)
                                <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original Price : <s>Rs {{ $product->original_price }}</s></label>
                        <label class="fw-bold">Selling Price : Rs {{ $product->selling_price }}</label>
                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>
                        <hr>
                        @if ($product->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                        <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                <label for="quantity">Quantity</label>
                                <div class="input-group  mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control text-center qty-input" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                  </div>
                            </div>
                            <div class="col-md-9">
                                <br/>
                                <button type="button" class="btn btn-primary addToCartBtn me-3 float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){

            $('.addToCartBtn').click(function(e){
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();

                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });

                $.ajax({
                    method: "post", // Use POST instead of GET
                    url: "{{ route('add-to-cart') }}",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(response){
                        swal(response.status);
                    }

                });
            });

        });
    </script>
@endpush