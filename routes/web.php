<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http; // Import the Http facade
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Home route
Route::get('/', function () {
    $response = Http::get('https://fakestoreapi.com/products');
    $products = $response->json();
    return view('welcome', compact('products'));
})->name('home'); 

// Products route
Route::get('/products', [ProductController::class, 'index'])->name('products');

// Cart routes
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
});



//fortify routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

//checkout routes
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', function () {
    return "Payment successful! Thank you for your order.";
})->name('checkout.success');
