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
Route::post('delivery', [HomeController::class, 'delivery'])->middleware('auth');


#Admin Panel
Route::resource('/admin/categories', App\Http\Controllers\Admin\CategoryController::class)->names([
    'index' => 'admin',
    ])->middleware('admin');

Route::get('/admin/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product')->middleware('admin');
Route::get('/admin/product/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->middleware('admin');
Route::get('/admin/product/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->middleware('admin');
Route::resource('/admin/deliverer', App\Http\Controllers\Admin\DelivererController::class)->names([
    'index' => 'deliverer',
])->middleware('admin');
Route::get('/admin/order', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders');
Route::get('/admin/order/{order}/approve', [App\Http\Controllers\Admin\OrderController::class, 'approve']);
Route::get('/admin/order/{order}/cancel', [App\Http\Controllers\Admin\OrderController::class, 'cancel']);

#User Panel
Route::resource('/user/products', App\Http\Controllers\User\ProductController::class)->names([
    'index' => 'user',
    ])->middleware('user');
Route::view('/user/change', 'user.change_password');
Route::post('/user/change', [App\Http\Controllers\User\UserController::class, 'changePassword']);

Route::get('/user/profile', [App\Http\Controllers\User\UserController::class, 'profileForm']);
Route::post('/user/profile', [App\Http\Controllers\User\UserController::class, 'userProfile']);

#Delivery
Route::get('/delivery', [App\Http\Controllers\Deliver\DeliverController::class, 'index'])->name('delivery')->middleware('deliver');
Route::get('/delivery/order/{order}/delivering', [App\Http\Controllers\Deliver\DeliverController::class, 'delivering']);


#Auth
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Auth::routes([
    'reset' => false,
    'confirm' => false,
]);
