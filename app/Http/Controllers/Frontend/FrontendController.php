<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class FrontendController extends Controller
{
    public function index(){

        $products = Product::where('status', 1)->latest()->limit(9)->get();
        $categories = Category::where('popular', 1)->latest()->limit(9)->get();
        return view('frontend.index', compact('products', 'categories'));
    }

    public function category(){

        $categories = Category::where('status', 0)->get();
        return view('frontend.category', compact('categories'));
    }

    public function categoryPro($slug){
        if(Category::where('slug', $slug)->exists()){
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cat_id', $category->id)->where('status', 1)->get();
            return view('frontend.product.index', compact('products', 'category'));
        }else{
            return redirect('/')->with('status', 'Slug doesnot exists');
        }
    }

    public function proDetails($cat_slug, $pro_slug){

        if(Category::where('slug', $cat_slug)->exists()){

            if(Product::where('slug', $pro_slug)->exists()){
                $product = Product::where('slug', $pro_slug)->first();
                $ratings = Rating::where('prod_id', $product->id)->get();
                $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();

                $prod_review = Review::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
                $total_reviews = Review::where('prod_id', $product->id)->get();
                
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                if($ratings->count() > 0){
                    $rating_value = $rating_sum/$ratings->count();
                }else{
                    $rating_value = 0;
                }
                
                return view('frontend.product.product-details', compact('product', 'ratings', 'rating_value', 'user_rating', 'prod_review', 'total_reviews'));
            }else{
                return redirect('/')->with('status', 'The link was broken');
            }
        }else{
            return redirect('/')->with('status', 'No such category found');
        }
    }

    public function addToWishlist(Request $request){
        if(Auth::check()){
            $product_id = $request->input('product_id');

            $product = Product::find($product_id);
            
            if($product){
                $check = Wishlist::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                if(!$check){
                    $wishlist = new Wishlist();
                    $wishlist->prod_id = $product_id;
                    $wishlist->user_id = Auth::id();
                    $wishlist->save();
                    return response()->json(['success' => 'Wishlist added successfully.']);
                }else{
                    $check->delete();
                    return response()->json(['error' => 'Wishlist removed successfully.']);
                }
                
                
            }else{
                return response()->json(['error' => 'Product does not exists.']);
            }
        }else{
            return response()->json(['error' => 'Please login first.']);
        }
    }

    public function viewWishlist(){
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.order.wishlist-view', compact('wishlists'));
    }

    public function removeWishlist(Request $request){

        if(Auth::check()){
            $product_id = $request->input('product_id');

            $product = Product::find($product_id);
            
            if($product){
                $check = Wishlist::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                $check->delete();
                return response()->json(['error' => 'Wishlist removed successfully.']);
                
            }else{
                return response()->json(['error' => 'Product does not exists.']);
            }
        }else{
            return response()->json(['error' => 'Please login first.']);
        }
    }

    public function loadCart(){
        $cartCount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $cartCount]);
    }

    public function loadWishlist(){
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishlistCount]);
    }

    public function productList(){
        
        $products = Product::select('name')->where('status', 1)->get();

        $data = [];

        foreach($products as $item){
            $data[] = $item['name'];
        }

        return $data;
    }

    public function searchPro(Request $request){



        $serch_product = $request->input('serch_product');

        if($serch_product != ""){
            
            $product = Product::where("name", "LIKE", "%$serch_product%")->first();

            if($product){
                return redirect('category-product-details/'.$product->category->slug.'/'.$product->slug)->with('product', $product->name);
            }else{
                return redirect()->back()->with('error', 'Sorry no Product match your search');
            }
        }else{
            
            return redirect()->back();
        }
    }
}
