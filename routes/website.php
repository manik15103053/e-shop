<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;






Route::get('/', [FrontendController::class,'index'])->name('index');
Route::get('/category', [FrontendController::class,'category'])->name('category');
Route::get('/category-product/{slug}',[FrontendController::class,'categoryPro'])->name('category-product');
Route::get('category-product-details/{cat_slug}/{pro_slug}',[FrontendController::class,'proDetails'])->name('category-product-details');
