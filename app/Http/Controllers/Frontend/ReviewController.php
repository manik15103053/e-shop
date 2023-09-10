<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addReview(Request $request){
       
        if(Auth::check()){

            $review = $request->input('user_review');
            $prod_id  = $request->input('prod_id');
            
            $check_prod = Product::where('id', $prod_id)->first();
            if($check_prod){

                $verified_purch = Order::where('orders.user_id', Auth::id())
                                  ->join('order_items', 'order_items.order_id','orders.id')
                                  ->where('order_items.prod_id', $prod_id)->get();

                    if($verified_purch->count() > 0){
                        $check_review = Review::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
                        if($check_review){
                            $check_review->user_review = $review;
                            $check_review->update();
                            return redirect()->back()->with('success', 'Your product review updated successfully.');
                        }else{

                            Review::create([
                                'user_id' => Auth::id(),
                                'prod_id' => $prod_id,
                                'user_review' => $review,
                            ]);
                            
                            return redirect()->back()->with('success', 'Thank you for your product review');
                        }
                    }else{
                        return redirect()->back()->with('error', 'Sorry you can not review a product without purchases');
                    }                
            }else{
                return redirect()->back()->with('error', 'This link you followed was broken');
            }
        }else{
            return redirect()->back()->with('error', 'Please Login first');
            
        }
    }
}
