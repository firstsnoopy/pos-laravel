<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [\App\Http\Controllers\LoginController::class, 'index']);
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');
Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');

// Route::middleware(['checkLevel:3'])->group(function () {});
Route::resource('penjualan', \App\Http\Controllers\TransactionController::class);

Route::resource('dashboard', \App\Http\Controllers\DashboardController::class)->middleware(['auth']);
Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('product', \App\Http\Controllers\ProductController::class);


Route::get('get-products/{category_id}', [\App\Http\Controllers\TransactionController::class, 'getProducts']);
Route::get('get-product/{product_id}', [\App\Http\Controllers\TransactionController::class, 'getProduct']);
Route::get('print/{id}', [\App\Http\Controllers\TransactionController::class, 'print']);
