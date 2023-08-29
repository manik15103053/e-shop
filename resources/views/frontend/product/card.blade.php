@extends('layouts.front')

@section('title')
 My Cart
@endsection
@section('main-content')
<div class="py-3 shadow-sm p-3 mb-5  rounded bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ route('index') }}">
                Home
            </a>
             / 
             <a href="{{ route('cart-details') }}">
                Cart
            </a>
            
         </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card  shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
            @foreach($cartItems as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{ asset($item->product->image) }}" alt="Product Image" height="55px">
                </div>
                <div class="col-md-5">
                    <h6>{{ $item->product->name }}</h6>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    <label for="quantity">Quantity</label>
                    <div class="input-group  mb-3" style="width: 130px">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control text-center qty-input" value="{{ $item->prod_qty }}">
                        <button class="input-group-text increment-btn">+</button>
                      </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger btn-sm delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){

            $('.delete-cart-item').click(function(e){
                e.preventDefault();

                var prod_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajax({
                method: "POST",
                url: "{{route('delete-cart-item')}}",
                data:{
                    'prod_id' : prod_id,
                    '_token': '{{ csrf_token() }}',
                },
                success:function (response){
                    swal("", response.status, "success");
                }
            });
            });

        });
    </script>
@endpush

@push('js')
    <script>
        $(document).ready(function(){

            $('.delete-cart-item').click(function(e){
                e.preventDefault();

                var prod_id = $(this).closest('.product_data').find('.prod_id').val();

                $.ajax({
                method: "POST",
                url: "{{route('delete-cart-item')}}",
                data:{
                    'prod_id' : prod_id,
                    '_token': '{{ csrf_token() }}',
                },
                success:function (response){
                    swal("", response.status, "success");
                }
            });
            });

        });
    </script>
@endpush