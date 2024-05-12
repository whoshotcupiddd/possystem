<?php

use Illuminate\Support\Facades\Route; // Make sure this line is added

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

// Homepage route
Route::get('/', [HomeController::class, 'index'])->name('index');
// Products routes
//add
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');// Store new product route
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

//view
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

//edit
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/products/{product}/update-image', [ProductController::class, 'updateImage'])->name('products.updateImage');
Route::delete('/products/{product}/delete-image', [ProductController::class, 'deleteImage'])->name('products.deleteImage');

// Orders routes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::post('/orders/proceed-to-payment', [OrderController::class, 'proceedToPayment'])->name('orders.proceedToPayment');

//Order history
Route::get('/order/history', [OrderController::class, 'history'])->name('order.history');

// Order Web Service
// Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

// Payment route
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
