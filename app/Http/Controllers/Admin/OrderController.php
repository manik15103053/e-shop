<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(){

        $orders = Order::where('status', 0)->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function orderView($id){

        $order = Order::find($id);
        return view('admin.order.order-view', compact('order'));
    }

    public function orderStatus(Request $request, $id){
        $order = Order::find($id);
        $order->status = $request->status;
        $order->update();
        return redirect()->route('admin.order')->with('status', 'Order Status Updated Successfully');
    }

    public function orderHistory(){
        $orders = Order::where('status', 1)->paginate(10);
        return view('admin.order.order-history', compact('orders'));
    }
}
