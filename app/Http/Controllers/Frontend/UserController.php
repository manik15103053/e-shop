<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myOrder(){

        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.order.index', compact('orders'));
    }

    public function orderDetails($id){

        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();

        return view('frontend.order.order-details', compact('order'));
    }
}
