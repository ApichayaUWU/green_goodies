<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\SummaryController;



Route::get('/', function () {
    return view('welcome');
});

// home with popular
Route::get('/home', [HomeController::class, 'popular'])->name('home');


// category search
Route::get('/categore/{searchTerm}', [ProductController::class, 'search'])->name('products.search');

// route to /products show for users
Route::get('/products', [ProductController::class, 'show'])->name('products.index');

// fruit and vegetable
Route::get('/vegetables', [ProductController::class, 'showVegetable'])->name('products.vegetables');
Route::get('/fruits', [ProductController::class, 'showFruit'])->name('products.fruits');

// search bar
Route::get('/search', [SearchController::class, 'search']);

// detail of each product
Route::get('/products/{product}', [ProductController::class, 'show_detail'])->name('products.detail');


Route::middleware('auth')->group(function () {
    
    // profile form
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // profile photo of user
    Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');
    
    // admin only
    Route::get('/products/create', [ProductController::class, 'form'])->name('products.form');
    Route::post('/products/create', [ProductController::class, 'store'])->name('products.form');
    
    // add to cart for detail page
    Route::post('/products/{product}', [CartController::class, 'addToCart'])->name('cart.add');

    // user's cart
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::put('/cart/update-all', [CartController::class, 'updateAll'])->name('cart.update.all');


    // user address
    Route::get('/profile/address', [UserAddressController::class, 'index'])->name('address.index');
    Route::get('/profile/address/create', [UserAddressController::class, 'form'])->name('address.form');
    Route::post('/profile/address', [UserAddressController::class, 'store'])->name('address.store');
    Route::delete('/profile/address/{id}', [UserAddressController::class, 'destroy'])->name('address.destroy');
    Route::get('/profile/address/{id}/edit', [UserAddressController::class, 'edit'])->name('address.edit');
    Route::put('/profile/address/{id}', [UserAddressController::class, 'update'])->name('address.update');

    // wishlist
    Route::get('/wishlist/{productId}', [WishListController::class, 'show'])->name('wishlist.toggle');
    Route::post('/wishlist/{productId}', [WishlistController::class, 'toggleWishlist'])->name('wishlist.toggle');
    Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist.index');

    // summary
    Route::get('/summary', [SummaryController::class, 'show'])->name('summary.show');
    Route::post('/add-sale', [SummaryController::class, 'add_sale'])->name('add.sale');
    //Route::get('/summarylog', [SummaryController::class, 'showlog'])->name('summary.show');
    Route::get('/order-success', [SummaryController::class, 'orderSuccess'])->name('order_success');
    
});

require __DIR__.'/auth.php';