<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CartConrtroller;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProductUploadCotroller;
use Illuminate\Support\Facades\Schema;

// Frontend Controller
Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/customer/register',[FrontendController::class,'register'])->name('customer.register')->middleware('CustomerAlreadyLoggin');
Route::get('/customer/login',[FrontendController::class,'login'])->name('customer.login')->middleware('CustomerAlreadyLoggin');
Route::get('/customer/profile',[CustomerController::class,'profile'])->name('customer.profile')->middleware('customer');
Route::get('product/detail/{slug}',[FrontendController::class,'detail'])->name('product.detail');
Route::get('/comment/list/{id}',[FrontendController::class,'commentList']);
Route::post('/reviews',[ReviewsController::class,'store'])->name('reviews');
Route::get('/product/upload/view',[ProductUploadCotroller::class,'index'])->name('product.upload.view');
Route::post('/product/upload',[ProductUploadCotroller::class,'store'])->name('product.upload.store');

// Admin Controller
Route::prefix('admin/')->name('admin.')->group(function (){
    Route::get('login',[FrontendController::class,'adminLogin'])->name('login')->middleware('AlreadyLoggedIn');
    Route::post('dashboard',[AdminLoginController::class,'check'])->name('dashboard');
    Route::get('dashboard',[AdminLoginController::class,'dashboard'])->name('Admindashboard')->middleware('admin');
    Route::get('logout',[AdminLoginController::class,'logout'])->name('logout');
    Route::get('product/add-product',[AdminController::class,'index'])->name('addproduct')->middleware('admin');
    Route::post('product/add-product',[AdminController::class,'store'])->name('storeproduct');
    Route::get('product/manage-product',[AdminController::class,'manage'])->name('manageproduct')->middleware('admin');
    Route::get('coupon',[AdminController::class,'coupon'])->name('coupon')->middleware('admin');
    Route::get('order/order',[AdminController::class,'order'])->name('order')->middleware('admin');
    Route::get('order/manage-order',[AdminController::class,'manageorder'])->name('manageorder')->middleware('admin');
});

// Customer Controller
Route::prefix('customer/')->name('customer.')->group(function (){
    Route::post('register',[CustomerController::class,'store'])->name('register');
    Route::post('check',[CustomerController::class,'check'])->name('check');
    Route::post('logout',[CustomerController::class,'logout'])->name('logout');
    Route::get('logout',[CustomerController::class,'logouts']);
});

// Card Controller
Route::post('cart',[CartConrtroller::class,'store']);
Route::post('add',[CartConrtroller::class,'add']);
Route::get('cart/',[CartConrtroller::class,'index'])->name('cart');
Route::put('cart/update',[CartConrtroller::class,'update'])->name('cart.update');
Route::delete('cart/update/{id}',[CartConrtroller::class,'destroy'])->name('cart.delete');
Route::get('carts/items',[CartConrtroller::class,'cartsItems']);
Route::get('cart/item/delete/{id}',[CartConrtroller::class,'listDelete']);

// Coupon Controller
Route::post('coupon/',[CouponController::class,'check'])->name('coupon');
Route::get('coupon/destroy',[CouponController::class,'destroy'])->name('coupon.destroy');

// Checkout Controller
Route::get('checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('success',[CheckoutController::class,'success'])->name('order.success');
Route::get('success/',[CheckoutController::class,'direct']);

// Like Controller
Route::post('like',[LikeController::class,'store'])->name('like');


Route::get('cartShow',[CartConrtroller::class,'cartShow']);

////////////////////

Route::post('/load/more/data',[LikeController::class,'load'])->name('loadmore.load_data');
