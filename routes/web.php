<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeController;

Route::get('/' , [AuthController::class , 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post' , [AuthController::class, 'register_post']);
Route::post('checkemail' , [AuthController::class, 'CheckEmail']);
Route::post('login_post' , [AuthController::class, 'login_post']);

// Admin HR
Route::middleware([AdminMiddleware::class])->group(function(){

    Route::get('admin/dashboard', [DashboardController::class , 'dashboard']);
    Route::get('/admin/employees' , [EmployeeController::class , 'index']);

});

Route::get('logout', [AuthController::class, 'logout']);
