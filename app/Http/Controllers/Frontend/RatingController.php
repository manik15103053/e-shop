<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function addRating(Request $request){

        if(Auth::check()){
            $prod_rate = $request->input('product_rating');
            $prod_id = $request->input('prod_id');

        $check_product = Product::where('id', $prod_id)->first();
        if($check_product){
            $verified_purs = Order::where('orders.user_id', Auth::id())
                                    ->join('order_items','order_items.order_id', 'orders.id')
                                    ->where('order_items.prod_id', $prod_id)->get();
             
              if($verified_purs->count() > 0){

                $check_rate = Rating::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
                if($check_rate){
                    $check_rate->stars_rated = $prod_rate;
                    $check_rate->update();
                    return redirect()->back()->with('success', 'Product rating updated successfully');
                }else{
                    $rating = new Rating();
                    $rating->user_id = Auth::id();
                    $rating->prod_id = $prod_id;
                    $rating->stars_rated = $prod_rate;
                    $rating->save();
                    return redirect()->back()->with('success', 'Thank you for your product rating');
                     
                }
              }else{
                return redirect()->back()->with('error', 'Sorry you can not rate a product without purchases');
              }                      
        }else{
            return redirect()->back()->with('error', 'This link you followed was broken');
        }
        }else{
            return redirect()->back()->with('error', 'Sorry login first');
        }
        
        
    }
}
