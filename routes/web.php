<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdukCon;
use App\Http\Controllers\PembelianCon;
use App\Http\Controllers\RegisterCon;
use App\Http\Controllers\CartCon;


Route::get('/', [ProdukCon::class, 'home'])->name('homeproduk');

Route::post('/pembelian/storeinput', [PembelianCon::class, 'storeinput'])
    ->name('storeInputpembelian')
    ->middleware('auth');

// Cart routes (auth required)
Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartCon::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartCon::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove', [CartCon::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart', [CartCon::class, 'getCart'])->name('cart.get');
    Route::post('/cart/checkout', [CartCon::class, 'checkoutCart'])->name('cart.checkout');
});

// Register user
Route::get('/register', [RegisterCon::class, 'register'])->name('register');
Route::post('/register/action', [RegisterCon::class, 'actionregister'])->name('actionregister');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');