<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Publik
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produk', [ProductController::class, 'index'])->name('catalog.index');
Route::get('/produk/{product}', [ProductController::class, 'show'])->name('catalog.show');

/*
|--------------------------------------------------------------------------
| Panel Admin (Manajemen Data Produk)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'create'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'store'])->name('login.store');
    Route::post('/logout', [AdminLoginController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('products', AdminProductController::class)
        ->except(['show'])
        ->parameters(['products' => 'product']);
});
