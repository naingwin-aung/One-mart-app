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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about');


Route::resource('/admin/categories', App\Http\Controllers\Admin\CategoryController::class)->names([
    'index' => 'admin',
    ])->middleware('admin');

Route::get('/admin/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->middleware('admin');
    
Route::resource('/user/products', App\Http\Controllers\User\ProductController::class)->names([
    'index' => 'user',
    ])->middleware('user');
        
Auth::routes([
    'reset' => false,
    'confirm' => false,
]);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
