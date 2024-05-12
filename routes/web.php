<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;// Import the AdminController

<<<<<<< HEAD
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
=======
Route::get('/', function () {
    return view('welcome');
});

Route::resource('staff', StaffController::class);

Route::get('/generate-staff-xml', [StaffController::class, 'generateXml'])->name('generate.staff.xml');
>>>>>>> origin/adminSystem

Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');

<<<<<<< HEAD
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
=======
Route::get('/admin/all-staff-leaves', [AdminController::class, 'index']);

Route::view('/admin/login', 'adminlogin')->name('admin.login');
Route::post('/admin/login', [StaffController::class, 'login'])->name('admin.login'); // Use array syntax to specify the controller method

Route::get('/profile/1', function () {
    return view('adminProfile');
});
>>>>>>> origin/adminSystem
