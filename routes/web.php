<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;// Import the AdminController

Route::get('/', function () {
    return view('welcome');
});

Route::resource('staff', StaffController::class);

Route::get('/generate-staff-xml', [StaffController::class, 'generateXml'])->name('generate.staff.xml');

Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');

Route::get('/admin/all-staff-leaves', [AdminController::class, 'index']);

Route::view('/admin/login', 'adminlogin')->name('admin.login');
Route::post('/admin/login', [StaffController::class, 'login'])->name('admin.login'); // Use array syntax to specify the controller method

Route::get('/profile/1', function () {
    return view('adminProfile');
});