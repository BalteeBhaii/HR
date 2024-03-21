<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\JobController;

Route::get('/' , [AuthController::class , 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post' , [AuthController::class, 'register_post']);
Route::post('checkemail' , [AuthController::class, 'CheckEmail']);
Route::post('login_post' , [AuthController::class, 'login_post']);

// Admin HR
Route::middleware([AdminMiddleware::class])->group(function(){

    Route::get('admin/dashboard', [DashboardController::class , 'dashboard']);
    Route::get('admin/employees' , [EmployeeController::class , 'index']);
    Route::get('admin/employees/add', [EmployeeController::class, 'add']);
    Route::post('admin/employees/add' , [EmployeeController::class, 'add_post']);
    Route::get('/admin/employees/view/{id}', [ EmployeeController::class, 'view']);
    Route::get('/admin/employees/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/admin/employees/edit/{id}', [EmployeeController::class, 'edit_update']);
    Route::get('/admin/employees/delete/{id}', [EmployeeController::class, 'delete']);

    // job routes
    Route::get('admin/jobs', [Jobcontroller::class , 'index']);
    Route::get('admin/jobs/add' , [JobController::class, 'add']);

});

Route::get('logout', [AuthController::class, 'logout']);
