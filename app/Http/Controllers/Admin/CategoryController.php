<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'description' => 'required',
        ]);

        $category = new Category();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('uploads/images/category', $fileName);
            $category->image = 'uploads/images/category/' . $fileName; // Set the image path
        }


        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status == TRUE ? '1' : '0';
        $category->popular = $request->popular == TRUE ? '1' : '0';
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category.index')->with('status', 'Category Created Successfully.');

    }

    public function edit($id){
        $category = Category::find($id);
        return View('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'description' => 'required',
        ]);

        $category = Category::find($id);

        if ($request->hasFile('image')) {

            if($category->image){
                $image_path = public_path($category->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('uploads/images/category', $fileName);



            $category->image = 'uploads/images/category/' . $fileName; // Set the new image path
        }


        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status == TRUE ? '1' : '0';
        $category->popular = $request->popular == TRUE ? '1' : '0';
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category.index')->with('status', 'Category Update Successfully.');
    }

    public function delete($id){

        $category = Category::find($id);

        if($category->image){
            $image_path = public_path($category->image);

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $category->delete();
        return redirect()->back()->with('status', 'Category Deleted Successfully.');
    }
}
