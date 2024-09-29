<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::resource('products', ProductController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/profile/photo/update', [UserController::class,'updateProfilePhoto'])->name('profile.update');

    // route to /products show for users
    Route::get('/products', [ProductController::class, 'show'])->name('products.index');
    // admin only
    Route::get('/products/create', [ProductController::class, 'form'])->name('products.form');
    Route::post('/products/create', [ProductController::class, 'store'])->name('products.form');

    Route::get('/products/{product}', [ProductController::class, 'show_detail'])->name('products.detail');
    Route::post('/products/{product}', [CartController::class, 'addToCart'])->name('cart.add');

    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');



});

require __DIR__.'/auth.php';
