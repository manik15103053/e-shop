<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckoutController extends Controller
{
    public function checkout()
{
    $cartItems = Cart::where('user_id', Auth::id())->get();

    $validCartItems = [];

    foreach ($cartItems as $item) {

        $product = Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->first();

        if ($product) {

            $validCartItems[] = $item;
        } else {

            $item->delete();
        }
    }

    $cartItem = Cart::where('user_id', Auth::id())->get();

    return view('frontend.product.checkout', compact('cartItem'));
}

    public function placeOrder(Request $request){

        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->pincode = $request->pincode;
        $order->tracking_no = 'sharma'.rand(1111, 9999);
        $order->save();

        $order_id = $order->id;

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $item){

            OrderItem::create([
                'order_id' => $order_id,
                'prod_id'  => $item->prod_id,
                'qty'     => $item->prod_qty,
                'price'   => $item->product->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address1 == null){

            $user = User::where('id', Auth::id())->first();
            $user->name = $request->fname;
            $user->lname = $request->lname;
            $user->phone = $request->phone;
            $user->address1 = $request->address1;
            $user->address2 = $request->address2;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->pincode = $request->pincode;
            $user->update();
        }


        $cartItem = Cart::where('user_id', Auth::id())->get();

        Cart::destroy($cartItem);

        return redirect('/')->with('success', 'Order placed Successfully.');
    }

}
