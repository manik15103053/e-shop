<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;






Route::get('/', [FrontendController::class,'index'])->name('index');
Route::get('/category', [FrontendController::class,'category'])->name('category');
Route::get('/category-product/{slug}',[FrontendController::class,'categoryPro'])->name('category-product');
Route::get('category-product-details/{cat_slug}/{pro_slug}',[FrontendController::class,'proDetails'])->name('category-product-details');
Route::get('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');
Route::get('/delete-cart-item', [CartController::class,'deleteCartItem'])->name('delete-cart-item');
Route::get('/update-card', [CartController::class,'updateCart'])->name('update-cart');
Route::post('/add-to-wishlist',[FrontendController::class,'addToWishlist'])->name('add-to-wishlist');
Route::get('/wishlist-view',[FrontendController::class,'viewWishlist'])->name('view-wishlist');
Route::get('/remove-wishlist',[FrontendController::class,'removeWishlist'])->name('remove-wishlist');
Route::get('/load-cart-data',[FrontendController::class,'loadCart'])->name('load-cart');
Route::get('/load-wishlit', [FrontendController::class,'loadWishlist'])->name('load-wishlist');
Route::post('/add-user-rating',[RatingController::class,'addRating'])->name('add-user-rating');
Route::post('/add-user-review',[ReviewController::class,'addReview'])->name('add-user-review');

Route::get('/product-list', [FrontendController::class,'productList'])->name('product-list');
Route::post('/serch-product',[FrontendController::class,'searchPro'])->name('serch-product');

//Paypal
// Route::get('/paypal-payment',[PaymentController::class,'paypalPayment'])->name('paypal-payment');
Route::get('paypal-success',[PaymentController::class,'paypalSuccess'])->name('paypal-success');
Route::get('paypal-cancel',[PaymentController::class,'paypalCancel'])->name('paypal-cancel');


Route::middleware(['auth'])->group(function(){
    Route::get('cart-details',[CartController::class,'cartDetails'])->name('cart-details');
    Route::get('/checkout', [CheckoutController::class,'checkout'])->name('checkout');
    Route::post('/place-order',[CheckoutController::class,'placeOrder'])->name('place-order');
    Route::get('/my-order',[UserController::class,'myOrder'])->name('my-order');
    Route::get('/order-details/{id}', [UserController::class,'orderDetails'])->name('order-details');
    Route::post('/proceed-to-pay', [CheckoutController::class, 'rezorPayCheck'])->name('proceed-to-pay');
});
