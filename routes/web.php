<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, logout)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';

// Search product di dashboard
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/category', [ProductController::class, 'category'])->name('products.category');

// Detail product
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Tambah ke keranjang
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Routing untuk pindah dari halaman cart ke halaman konfirmasi pengiriman
Route::get('/cart/confirm', function () {
    return view('cart.confirm');
})->name('confirm.index');

// Delivery
Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery.index');
Route::post('/delivery/store', [DeliveryController::class, 'store'])->name('delivery.store');
Route::get('/nextpage', function () {
    return view('delivery.nextpage');
});
Route::get('/delivery/summary', [DeliveryController::class, 'showSummary'])->name('delivery.summary');

// Pickup
Route::get('/pickup', [PickupController::class, 'index'])->name('pickup.index');
Route::get('/pickup/ringkasan', [PickupController::class, 'showRingkasan'])->name('pickup.ringkasan');

// Payment
// Payment delivery
Route::get('/payment/delivery', [PaymentController::class, 'showDeliveryPaymentPage'])->name('payment.delivery');
Route::post('/payment/process-delivery', [PaymentController::class, 'processDeliveryPayment'])->name('payment.processDelivery');

// Payment pickup
Route::get('/payment/pickup', [PaymentController::class, 'showPickupPaymentPage'])->name('payment.pickup');
Route::post('/payment/process-pickup', [PaymentController::class, 'processPickupPayment'])->name('payment.processPickup');

// Rute konfirmasi
// Pickup
Route::get('/confirmation', function () {
    return view('confirmation');
})->name('confirmation');

// Delivery
Route::get('/confirmation/delivery', function () {
    return view('confirmationDelivery');
})->name('confirmation.delivery');


