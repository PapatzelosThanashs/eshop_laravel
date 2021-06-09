<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/logout',[AdminController::class,'logout']);
    /* crud admin category routes */
    Route::get('/admin/category',[CategoryController::class,'index']);
    Route::get('/admin/category/create',[CategoryController::class,'create']);
    Route::post('/admin/category',[CategoryController::class,'store']);
    Route::delete('/admin/category/{category_id}',[CategoryController::class,'delete']);
    Route::get('/admin/category/{category_id}',[CategoryController::class,'show']);
    Route::patch('/admin/category/{category}',[CategoryController::class,'update']);
    
    
});
