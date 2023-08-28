<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
                return view('frontend.product.product-details', compact('product'));
            }else{
                return redirect('/')->with('status', 'The link was broken');
            }
        }else{
            return redirect('/')->with('status', 'No such category found');
        }
    }
}
