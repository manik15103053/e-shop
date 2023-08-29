<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;






Route::get('/', [FrontendController::class,'index'])->name('index');
Route::get('/category', [FrontendController::class,'category'])->name('category');
Route::get('/category-product/{slug}',[FrontendController::class,'categoryPro'])->name('category-product');
Route::get('category-product-details/{cat_slug}/{pro_slug}',[FrontendController::class,'proDetails'])->name('category-product-details');
Route::get('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');
Route::get('/delete-cart-item', [CartController::class,'deleteCartItem'])->name('delete-cart-item');
Route::get('/update-card', [CartController::class,'updateCart'])->name('update-cart');
Route::middleware(['auth'])->group(function(){

    Route::get('cart-details',[CartController::class,'cartDetails'])->name('cart-details');
});
