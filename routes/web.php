<?php
declare(strict_types=1);

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserController;
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

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');


/* admin functionality */
Route::middleware(['AdminAuth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.index');
    Route::get('/admin/logout', [AdminController::class, 'logout']);

    /* crud admin category routes */
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/admin/category/create', [CategoryController::class, 'create']);
    Route::post('/admin/category', [CategoryController::class, 'store']);
    Route::delete('/admin/category/{category}', [CategoryController::class, 'delete']);
    Route::get('/admin/category/{category}', [CategoryController::class, 'show']);
    Route::put('/admin/category/{category}', [CategoryController::class, 'update']);
    Route::get('/admin/category/{category}/{status}', [CategoryController::class, 'status']);

    /* crud admin coupon routes */
    Route::get('/admin/coupon', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('/admin/coupon/create', [CouponController::class, 'create']);
    Route::post('/admin/coupon', [CouponController::class, 'store']);
    Route::delete('/admin/coupon/{coupon_id}', [CouponController::class, 'delete']);
    Route::get('/admin/coupon/{coupon_id}', [CouponController::class, 'show']);
    Route::put('/admin/coupon/{coupon}', [CouponController::class, 'update']);
    Route::get('/admin/coupon/{coupon_id}/{status}', [CouponController::class, 'status']);

    /* crud admin size routes */
    Route::get('/admin/size', [SizeController::class, 'index'])->name('size.index');
    Route::get('/admin/size/create', [SizeController::class, 'create']);
    Route::post('/admin/size', [SizeController::class, 'store']);
    Route::delete('/admin/size/{size_id}', [SizeController::class, 'delete']);
    Route::get('/admin/size/{size_id}', [SizeController::class, 'show']);
    Route::put('/admin/size/{size}', [SizeController::class, 'update']);
    Route::get('/admin/size/{size_id}/{status}', [SizeController::class, 'status']);

    /* crud admin color routes */
    Route::get('/admin/color', [ColorController::class, 'index'])->name('color.index');
    Route::get('/admin/color/create', [ColorController::class, 'create']);
    Route::post('/admin/color', [ColorController::class, 'store']);
    Route::delete('/admin/color/{color_id}', [ColorController::class, 'delete']);
    Route::get('/admin/color/{color_id}', [ColorController::class, 'show']);
    Route::put('/admin/color/{color}', [ColorController::class, 'update']);
    Route::get('/admin/color/{color_id}/{status}', [ColorController::class, 'status']);

    /* crud admin product routes */
    Route::get('/admin/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/admin/product/create', [ProductController::class, 'create']);
    Route::post('/admin/product', [ProductController::class, 'store']);
    Route::delete('/admin/product/{product_id}', [ProductController::class, 'delete']);
    Route::get('/admin/product/{product_id}', [ProductController::class, 'show']);
    Route::put('/admin/product/{product}', [ProductController::class, 'update']);
    Route::get('/admin/product/{product_id}/{status}', [ProductController::class, 'status']);
    Route::get('/admin/del_attr/{productattribute_id}', [ProductController::class, 'removeAttr']);
    Route::get('/admin/del_image/{productimage_id}', [ProductController::class, 'removeMutipleImages']);

    /* crud admin brand routes */
    Route::get('/admin/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/admin/brand/create', [BrandController::class, 'create']);
    Route::post('/admin/brand', [BrandController::class, 'store']);
    Route::delete('/admin/brand/{brand_id}', [BrandController::class, 'delete']);
    Route::get('/admin/brand/{brand_id}', [BrandController::class, 'show']);
    Route::put('/admin/brand/{brand}', [BrandController::class, 'update']);
    Route::get('/admin/brand/{brand_id}/{status}', [BrandController::class, 'status']);

    /* crud admin tax routes */
    Route::get('/admin/tax', [TaxController::class, 'index'])->name('tax.index');
    Route::get('/admin/tax/create', [TaxController::class, 'create']);
    Route::post('/admin/tax', [TaxController::class, 'store']);
    Route::delete('/admin/tax/{tax_id}', [TaxController::class, 'delete']);
    Route::get('/admin/tax/{tax_id}', [TaxController::class, 'show']);
    Route::put('/admin/tax/{tax}', [TaxController::class, 'update']);
    Route::get('/admin/tax/{tax_id}/{status}', [TaxController::class, 'status']);

    /* crud admin User routes */
    Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/admin/user/{user_id}', [UserController::class, 'show']);
    Route::get('/admin/user/{user_id}/{status}', [UserController::class, 'status']);

});
