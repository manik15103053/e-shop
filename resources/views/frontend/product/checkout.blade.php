@extends('layouts.front')

@section('title')
 Product Checkout
@endsection
@section('main-content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body ">
                        <h6>Basic Details</h6>
                        <hr>
                        <form action="{{ route('place-order') }}" method="post">
                            @csrf
                        <div class="row py-2">
                            <div class="col-6">
                                <div class="form-group mt-1">
                                    <label for="fname">First Name</label>
                                    <input type="text" value="{{ Auth::user()->name }}" name="fname" class="form-control fname" placeholder="First Name" required>
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-1">
                                    <label for="fname">last Name</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control lname" placeholder="last Name" required>
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Email</label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control email" placeholder="Email Name" required>
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Phone</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control phone" placeholder="Phone Name" required>
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Address 1</label>
                                    <input type="text" name="address1" class="form-control address1" value="{{ Auth::user()->address1 }}" placeholder="Address 1" required>
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Address 2</label>
                                    <input type="text" name="address2" class="form-control address2" value="{{ Auth::user()->address2 }}" placeholder="Address 2" >
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">City</label>
                                    <input type="text" name="city" class="form-control city" value="{{ Auth::user()->city }}" placeholder="City" required>
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">State</label>
                                    <input type="text" name="state" class="form-control state" value="{{ Auth::user()->state }}" placeholder="State" required>
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Country</label>
                                    <input type="text" name="country" class="form-control country" value="{{ Auth::user()->country }}" placeholder="Country" required>
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Pin Code</label>
                                    <input type="text" name="pincode" class="form-control pincode" value="{{ Auth::user()->pincode }}" placeholder="Pin Code" required>
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        @if ($cartItem->count() > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($cartItem as $item)
                                   <tr>
                                    @php
                                        $total += ($item->product->selling_price * $item->prod_qty);
                                    @endphp
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ $item->product->selling_price * $item->prod_qty }}</td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h6 class="px-2">Grand Total<span class="float-end">Rs {{ $total }}</span></h6>
                        <hr>
                        <input type="hidden" name="total_price" value="{{ $total }}">
                        <input type="hidden" name="payment_mode" value="paypal">
                        <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" class="btn btn-primary float-end w-100">Place Order | COD</button>
                        <button type="button" class="btn btn-success float-end w-100 mt-3 razorpay_btn mb-3">Pay with Razorpay</button>
                        {{-- <button type="submit" class="btn btn-info float-end w-100">Pay with Paypal</button> --}}
                        @else
                        <h4 class="text-center">No Products In Cart</h4>
                        @endif
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
{{-- <script src="https://www.paypal.com/sdk/js?client-id=AbRUZJTgeKPos8g3PC2Yy7obPW342CI-jG82BA5TdeRB8yB0rdlhfj_fDxr2H9qfGjp176vwVmZ0wtfy"></script> --}}
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>



@endpush