<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthRegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('guest.welcome');
});

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/product-{id}',[ShopController::class, 'viewproduct'])->name('product.details');



Route::get('/contact', function () {
    return view('guest.contact');
})->name('contact');

Route::get('/about', function () {
    return view('guest.about');
});

Route::get('/login', function () {
    return view('guest.login');
})->name("login");

Route::post('/register', [AuthRegisterController::class, 'register'])->name('register');
Route::post('/login', [AuthLoginController::class, 'login'])->name('login.submit');


Route::middleware('auth')->group(function () {

   Route::get ('/my-account', [AccountController::class, 'viewOrders'])->name('My-Account');
   Route::get ('/admin', [AdminController::class, 'adminDashboard'])->name('My-Account');


    Route::get('/cart', [CartController::class, 'show'])->name('cart');

    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');

    Route::get('/orders-{id}',[OrderController::class, 'details'])->name('order.details');

    Route::post('/change-password', [AccountController::class, 'changePassword'])->name('change.password');

    Route::get('/address-edit', [AccountController::class, 'addressedit'])->name('address.edit');
    Route::put('/address-update', [AccountController::class, 'updateAddress'])->name('address.update');

    Route::get('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');

    Route::put('/cart/{id}', [CartController::class, 'updateCartItem'])->name('updateCartItem');

    Route::put('/cart-checkout',[CheckoutController::class, 'checkout'])->name('checkout');

    Route::put('/orders/{id}/updateStatus',[AdminController::class, 'updateStatus'])->name('order.updateStatus');

    Route::get('/contact-{id}', [ContactController::class, 'show'])->name('contact.details');

});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')->middleware('web');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
