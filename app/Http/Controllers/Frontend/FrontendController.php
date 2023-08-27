<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $products = Product::where('status', 1)->latest()->limit(9)->get();
        return view('frontend.index', compact('products'));
    }
}
