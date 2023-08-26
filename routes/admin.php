<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;




Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');
    
    //Category
    Route::prefix('categories')->name('category.')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
    });
});