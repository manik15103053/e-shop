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
                                    <input type="text" value="{{ Auth::user()->name }}" name="fname" class="form-control" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-1">
                                    <label for="fname">last Name</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control" placeholder="last Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Email</label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Email Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Phone</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" placeholder="Phone Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Address 1</label>
                                    <input type="text" name="address1" class="form-control" value="{{ Auth::user()->address1 }}" placeholder="Address 1" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Address 2</label>
                                    <input type="text" name="address2" class="form-control" value="{{ Auth::user()->address2 }}" placeholder="Address 2" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ Auth::user()->city }}" placeholder="City" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">State</label>
                                    <input type="text" name="state" class="form-control" value="{{ Auth::user()->state }}" placeholder="State" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Country</label>
                                    <input type="text" name="country" class="form-control" value="{{ Auth::user()->country }}" placeholder="Country" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="fname">Pin Code</label>
                                    <input type="text" name="pincode" class="form-control" value="{{ Auth::user()->pincode }}" placeholder="Pin Code" required>
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
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItem as $item)
                                   <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ $item->product->selling_price * $item->prod_qty }}</td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place Order</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
