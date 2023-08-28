<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){

        $products = Product::OrderBy('id', 'desc')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create(){

        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request){


        $request->validate([
            'cat_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'qty' => 'required',
            'tax' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'description' => 'required',
        ]);

        $product = new Product();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('uploads/images/product', $fileName);
            $product->image = 'uploads/images/product/' . $fileName; // Set the image path
        }


        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->small_description = $request->small_description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->qty = $request->qty;
        $product->tax = $request->tax;
        $product->status = $request->status == TRUE ? '1' : '0';
        $product->trending = $request->trending == TRUE ? '1' : '0';
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('product.index')->with('status', 'Product Created Successfully.');

    }

    public function edit($id){

        $product = Product::find($id);
        $categories = Category::orderBy('id', 'desc')->get();
        return View('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'cat_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'qty' => 'required',
            'tax' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'description' => 'required',
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {

            if($product->image){
                $image_path = public_path($product->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('uploads/images/product', $fileName);



            $product->image = 'uploads/images/product/' . $fileName; // Set the new image path
        }


        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->small_description = $request->small_description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->qty = $request->qty;
        $product->tax = $request->tax;
        $product->status = $request->status == TRUE ? '1' : '0';
        $product->trending = $request->trending == TRUE ? '1' : '0';
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('product.index')->with('status', 'Product Updated Successfully.');
    }

    public function delete($id){

        $product = Product::find($id);

        if($product->image){
            $image_path = public_path($product->image);

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $product->delete();
        return redirect()->back()->with('status', 'Product Deleted Successfully.');
    }
}
