<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WishlistController;



Route::get('/', function () {
    return view('welcome');
});

// Replace the old home route with this one
Route::get('/home', [HomeController::class, 'popular'])->middleware(['auth', 'verified'])->name('home');

Route::resource('products', ProductController::class);

Route::middleware('auth')->group(function () {
    // profile form
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // profile photo of user
    Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');
    
    // route to /products show for users
    Route::get('/products', [ProductController::class, 'show'])->name('products.index');
    // admin only
    Route::get('/products/create', [ProductController::class, 'form'])->name('products.form');
    Route::post('/products/create', [ProductController::class, 'store'])->name('products.form');
    
    // detail of each product
    Route::get('/products/{product}', [ProductController::class, 'show_detail'])->name('products.detail');
    Route::post('/products/{product}', [CartController::class, 'addToCart'])->name('cart.add');

    // user's cart
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    // user address
    Route::get('/profile/address', [UserAddressController::class, 'index'])->name('address.index');
    Route::get('/profile/address/create', [UserAddressController::class, 'form'])->name('address.form');
    Route::post('/profile/address', [UserAddressController::class, 'store'])->name('address.store');
    Route::delete('/profile/address/{id}', [UserAddressController::class, 'destroy'])->name('address.destroy');
    Route::get('/profile/address/{id}/edit', [UserAddressController::class, 'edit'])->name('address.edit');
    Route::put('/profile/address/{id}', [UserAddressController::class, 'update'])->name('address.update');

    // wishlist
    Route::get('/wishlist/{productId}', [WishListController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{productId}', [WishlistController::class, 'toggleWishlist'])->name('wishlist.toggle');


});

require __DIR__.'/auth.php';