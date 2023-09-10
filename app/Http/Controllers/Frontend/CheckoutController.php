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
use Srmklive\PayPal\Services\PayPal;

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

        $order->payment_mode = $request->payment_mode;
        $order->payment_id = $request->payment_id;

        $total = 0;

        $cartTotal_items = Cart::where('user_id', Auth::id())->get();

        foreach($cartTotal_items as $item){
            $total += $item->product->selling_price;
        }

        $order->total_price = $total;
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

        if($request->payment_mode == "paypal"){
            $response = $this->paypalPayment($request->total_price, $cartItem);
            return redirect()->away($response);
        }

        if($request->payment_mode == "Paid by Razorpay"){
            return response()->json(['success' => 'Order placed Successfully']);
        }

        return redirect('/')->with('success', 'Order placed Successfully.');
    }

    public function rezorPayCheck(Request $request){

        $cartItems = Cart::where('user_id', Auth::id())->get();

        $total_price = 0;
        foreach($cartItems as $item){
            $total_price += $item->product->selling_price * $item->prod_qty;
        }

        $fname      =     $request->input('fname');
        $lname      =     $request->input('lname');   
        $email      =     $request->input('email');
        $phone      =     $request->input('phone');
        $address1   =     $request->input('address1');
        $address2   =     $request->input('address2');
        $city       =     $request->input('city');
        $state      =     $request->input('state');
        $country    =     $request->input('country');
        $pincode    =     $request->input('pincode');

        return response()->json([

            'fname'         => $fname,
            'lname'         => $lname,
            'email'         => $email,
            'phone'         => $phone,
            'address1'      => $address1,
            'address2'      => $address2,
            'city'          => $city,
            'state'         => $state,
            'country'       => $country,
            'pincode'       => $pincode,
            'total_price'   => $total_price,
        ]);
    }

    public function paypalPayment(Request $request, $data){

        $total_price = $request->input('total_price');

        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        // Create the PayPal order
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal-success',[
                    'data' => $data,
                    'amount' => $total_price
                ]),
                "cancel_url"=> route('paypal-cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total_price,
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id'] != null){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve'){
                    return response()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal-cancel');
        }

    }

    public function paypalSuccess(Request $request){

        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
             return redirect()->route('my-order')->with('success', 'Order placed Successfully.');
        } else {
            return redirect()->route('paypal-cancel');
        }
    }

    public function paypalCancel(){
        return "Payment is Cancel";
    }

}
