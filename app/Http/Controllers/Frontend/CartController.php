<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
{
    $product_id = $request->input('product_id');
    $product_qty = $request->input('product_qty');

    if (!Auth::check()) {
        return response()->json(['status' => 'Login to Continue']);
    }

    $product = Product::find($product_id);

    if (!$product) {
        return response()->json(['status' => 'Product not found']);
    }

    $existingCartItem = Cart::where('prod_id', $product_id)
        ->where('user_id', Auth::id())
        ->first();

    if ($existingCartItem) {
        return response()->json(['error' => $product->name . 'already added to cart']);
    }

    $cartItem = new Cart();
    $cartItem->user_id = Auth::id();
    $cartItem->prod_id = $product_id;
    $cartItem->prod_qty = $product_qty;
    $cartItem->save();

    return response()->json(['success' => $product->name . 'added to cart successfully']);
}

   public function cartDetails(){

    $cartItems = Cart::where('user_id', Auth::id())->get();
    return view('frontend.product.card', compact('cartItems'));

   }

   public function deleteCartItem(Request $request)
{
    if (Auth::check()) {
        $product_id = $request->input('prod_id');

        $cartItem = Cart::where('prod_id', $product_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => 'Product Deleted Successfully']);
        } else {
            return response()->json(['error' => 'Product not found in cart'], 404);
        }
    } else {
        return response()->json(['error' => 'Login to Continue'], 401);
    }
}

    public function updateCart(Request $request){

        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');

        if(Auth::check()){
            $cartItem = Cart::where('prod_id', $prod_id)
            ->where('user_id', Auth::id())
            ->first();

            if($cartItem){
                $cartItem->prod_qty = $prod_qty;
                $cartItem->update();


                return response()->json(['success' => 'Quantity Updated']);
            }
        }
    }

}
