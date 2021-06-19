<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',[AdminController::class,'index']);
Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::middleware(['AdminAuth'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard.index');
    Route::get('/admin/logout',[AdminController::class,'logout']);

    /* crud admin category routes */
    Route::get('/admin/category',[CategoryController::class,'index'])->name('category.index');
    Route::get('/admin/category/create',[CategoryController::class,'create']);
    Route::post('/admin/category',[CategoryController::class,'store']);
    Route::delete('/admin/category/{category_id}',[CategoryController::class,'delete']);
    Route::get('/admin/category/{category_id}',[CategoryController::class,'show']);
    Route::patch('/admin/category/{category}',[CategoryController::class,'update']);
    Route::get('/admin/category/{category_id}/{status}',[CategoryController::class,'status']);

    /* crud admin coupon routes */
    Route::get('/admin/coupon',[CouponController::class,'index'])->name('coupon.index');
    Route::get('/admin/coupon/create',[CouponController::class,'create']);
    Route::post('/admin/coupon',[CouponController::class,'store']);
    Route::delete('/admin/coupon/{coupon_id}',[CouponController::class,'delete']);
    Route::get('/admin/coupon/{coupon_id}',[CouponController::class,'show']);
    Route::patch('/admin/coupon/{coupon}',[CouponController::class,'update']);
    Route::get('/admin/coupon/{coupon_id}/{status}',[CouponController::class,'status']);

    /* crud admin size routes */
    Route::get('/admin/size',[SizeController::class,'index'])->name('size.index');
    Route::get('/admin/size/create',[SizeController::class,'create']);
    Route::post('/admin/size',[SizeController::class,'store']);
    Route::delete('/admin/size/{size_id}',[SizeController::class,'delete']);
    Route::get('/admin/size/{size_id}',[SizeController::class,'show']);
    Route::patch('/admin/size/{size}',[SizeController::class,'update']);
    Route::get('/admin/size/{size_id}/{status}',[SizeController::class,'status']);

     /* crud admin color routes */
     Route::get('/admin/color',[ColorController::class,'index'])->name('color.index');
     Route::get('/admin/color/create',[ColorController::class,'create']);
     Route::post('/admin/color',[ColorController::class,'store']);
     Route::delete('/admin/color/{color_id}',[ColorController::class,'delete']);
     Route::get('/admin/color/{color_id}',[ColorController::class,'show']);
     Route::patch('/admin/color/{color}',[ColorController::class,'update']);
     Route::get('/admin/color/{color_id}/{status}',[ColorController::class,'status']);

     /* crud admin product routes */
     Route::get('/admin/product',[ProductController::class,'index'])->name('product.index');
     Route::get('/admin/product/create',[ProductController::class,'create']);
     Route::post('/admin/product',[ProductController::class,'store']);
     Route::delete('/admin/product/{product_id}',[ProductController::class,'delete']);
     Route::get('/admin/product/{product_id}',[ProductController::class,'show']);
     Route::patch('/admin/product/{product}',[ProductController::class,'update']);
     Route::get('/admin/product/{product_id}/{status}',[ProductController::class,'status']);
     Route::get('/admin/del_attr/{productattribute_id}',[ProductController::class,'removeAttr']);
     Route::get('/admin/del_image/{productimage_id}',[ProductController::class,'removeMutipleImages']);
    
    
});
