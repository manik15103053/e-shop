<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');

    //Category
    Route::prefix('categories')->name('category.')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}',[CategoryController::class, 'delete'])->name('delete');
    });

    //Product
    Route::prefix('products')->name('product.')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::post('/store',[ProductController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[ProductController::class, 'update'])->name('update');
        Route::get('/delete/{id}',[ProductController::class, 'delete'])->name('delete');
    });
});
