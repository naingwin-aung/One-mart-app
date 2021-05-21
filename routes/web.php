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
Route::post('delivery', [HomeController::class, 'delivery']);


#Admin Panel
Route::prefix('admin')->group(function () {
    Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class)->names([
        'index' => 'admin',
        ]);
    
    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product');
    Route::get('/product/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show']);
    Route::get('/product/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show']);
    
    Route::resource('/deliverer', App\Http\Controllers\Admin\DelivererController::class)->names([
        'index' => 'deliverer',
    ]);
    
    Route::get('/order', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders');
    Route::get('/order/{order}/approve', [App\Http\Controllers\Admin\OrderController::class, 'approve']);
    Route::get('/order/{order}/cancel', [App\Http\Controllers\Admin\OrderController::class, 'cancel']);
    
    Route::get('/order/cancel', [App\Http\Controllers\Admin\OrderController::class, 'orderCancel']);
    Route::get('/order/delivering', [App\Http\Controllers\Admin\OrderController::class, 'orderDelivering']);
    Route::get('/order/done', [App\Http\Controllers\Admin\OrderController::class, 'orderDone']);
});


#User Panel
Route::prefix('user')->group(function() {
    Route::resource('/products', App\Http\Controllers\User\ProductController::class)->names([
        'index' => 'user',
        ]);
    Route::view('/change', 'user.change_password')->middleware('user');
    Route::post('/change', [App\Http\Controllers\User\UserController::class, 'changePassword']);
    
    Route::get('/profile', [App\Http\Controllers\User\UserController::class, 'profileForm']);
    Route::post('/profile', [App\Http\Controllers\User\UserController::class, 'userProfile']);
});

#Delivery
Route::prefix('delivery')->group(function () {
    Route::get('/order', [App\Http\Controllers\Deliver\DeliverController::class, 'index'])->name('delivery');
    Route::get('/delivering', [App\Http\Controllers\Deliver\DeliverController::class, 'orderDeliveringItems'])->name('delivering.items');
    
    Route::get('/order/{order}/delivering', [App\Http\Controllers\Deliver\DeliverController::class, 'delivering']);
    Route::get('/order/{order}/done', [App\Http\Controllers\Deliver\DeliverController::class, 'done']);
});


#Auth
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Auth::routes([
    'reset' => false,
    'confirm' => false,
]);
