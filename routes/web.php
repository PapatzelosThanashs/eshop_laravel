<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
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
    Route::get('/admin/category/{category_id}/{type}',[CategoryController::class,'type']);

    /* crud admin coupon routes */
    Route::get('/admin/coupon',[CouponController::class,'index'])->name('coupon.index');
    Route::get('/admin/coupon/create',[CouponController::class,'create']);
    Route::post('/admin/coupon',[CouponController::class,'store']);
    Route::delete('/admin/coupon/{coupon_id}',[CouponController::class,'delete']);
    Route::get('/admin/coupon/{coupon_id}',[CouponController::class,'show']);
    Route::patch('/admin/coupon/{coupon}',[CouponController::class,'update']);
    Route::get('/admin/coupon/{coupon_id}/{type}',[CouponController::class,'type']);
    
    
});
