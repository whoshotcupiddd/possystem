
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffLeaveController;

Route::get('staff-leaves', [StaffLeaveController::class, 'index']);
Route::post('staff-leaves', [StaffLeaveController::class, 'store']);
Route::get('staff-leaves/{id}', [StaffLeaveController::class, 'show']);
Route::put('staff-leaves/{id}', [StaffLeaveController::class, 'update']);
Route::delete('staff-leaves/{id}', [StaffLeaveController::class, 'destroy']);