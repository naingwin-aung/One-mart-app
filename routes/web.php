<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProductController;

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

#Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about');
Route::get('/category/{category_id}/all', [HomeController::class, 'categoryAll'])->name('all');
Route::post('/category/{category_id}/all', [HomeController::class, 'categoryAll'])->name('all');
Route::get('/product/detail/{product}', [HomeController::class, 'productDetail'])->name('detail');
Route::get('user/detail/{user}', [HomeController::class, 'userDetail'])->name('user.detail');

#Admin Panel
Route::resource('/admin/categories', App\Http\Controllers\Admin\CategoryController::class)->names([
    'index' => 'admin',
    ])->middleware('admin');

Route::get('/admin/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product')->middleware('admin');
Route::get('/admin/product/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->middleware('admin');
    

#User Panel
Route::resource('/user/products', App\Http\Controllers\User\ProductController::class)->names([
    'index' => 'user',
    ])->middleware('user');
Route::view('/user/change', 'user.change_password');
Route::post('/user/change', [App\Http\Controllers\User\UserController::class, 'changePassword']);

Route::get('/user/profile', [App\Http\Controllers\User\UserController::class, 'profileForm']);
Route::post('/user/profile', [App\Http\Controllers\User\UserController::class, 'userProfile']);
        

#Auth
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Auth::routes([
    'reset' => false,
    'confirm' => false,
]);
