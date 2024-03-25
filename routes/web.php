<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\JobHistoryController;



Route::get('/' , [AuthController::class , 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post' , [AuthController::class, 'register_post']);
Route::post('checkemail' , [AuthController::class, 'CheckEmail']);
Route::post('login_post' , [AuthController::class, 'login_post']);



// Admin HR
Route::middleware([AdminMiddleware::class])->group(function(){

    // Employee
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
    Route::post('admin/jobs/add' , [JobController::class, 'add_post']);
    Route::get('admin/jobs/view/{id}' , [JobController::class, 'view']);
    Route::get('admin/jobs/edit/{id}' , [JobController::class, 'edit']);
    Route::post('admin/jobs/edit/{id}' , [JobController::class, 'edit_update']);
    Route::get('admin/jobs/delete/{id}' ,[JobController::class, 'delete']);
    Route::get('admin/jobs_export' , [JobController::class, 'job_export']);

    // Job history
    Route::get('admin/job_history' , [JobHistoryController::class , 'index']);
    Route::get('admin/job_history/add' , [JobHistoryController::class, 'add']);

});

Route::get('logout', [AuthController::class, 'logout']);
