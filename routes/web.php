<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\JobHistoryController;
use App\Http\Controllers\Backend\JobGradesController;
use App\Http\Controllers\Backend\RegionController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\ManagerController;
use App\Http\Controllers\Backend\MyAccountController;
use App\Http\Controllers\Backend\LeaveController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;



Route::get('/' , [AuthController::class , 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post' , [AuthController::class, 'register_post']);
Route::post('checkemail' , [AuthController::class, 'CheckEmail']);
Route::post('login_post' , [AuthController::class, 'login_post']);



// Admin HR
// Route::middleware([AdminMiddleware::class])->group(function(){
    Route::group(['middleware' => [AdminMiddleware::class]], function () {
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
    Route::post('admin/job_history/add' , [JobHistoryController::class, 'add_post']);
    Route::get('admin/job_history/edit/{id}' , [JobHistoryController::class, 'edit']);
    Route::post('admin/job_history/edit/{id}' , [JobHistoryController::class, 'edit_update']);
    Route::get('admin/job_history/delete/{id}' , [JobHistoryController::class, 'delete']);
    Route::get('admin/job_history_export' , [JobHistoryController::class, 'job_history_export']);

    // Job Gades route start

    Route::get('admin/job_grades' , [JobGradesController::class, 'index']);
    Route::get('admin/job_grades/add' , [JobGradesController::class, 'add']);
    Route::post('admin/job_grades/add' , [JobGradesController::class, 'add_post']);
    Route::get('admin/job_grades/edit/{id}' , [JobGradesController::class, 'edit']);
    Route::post('admin/job_grades/edit/{id}' , [JobGradesController::class, 'edit_update']);
    Route::get('admin/job_grades/delete/{id}' , [JobGradesController::class, 'delete']);


    // Regions
    Route::get('admin/regions' , [RegionController::class , 'index']);
    Route::get('admin/regions/add' , [RegionController::class, 'add']);
    Route::post('admin/regions/add' , [RegionController::class, 'add_post']);
    Route::get('admin/regions/edit/{id}' , [RegionController::class, 'edit']);
    Route::post('admin/regions/edit/{id}' , [RegionController::class, 'edit_update']);
    Route::get('admin/regions/delete/{id}' , [RegionController::class, 'delete']);

    // counteries
    Route::get('admin/countries' , [CountryController::class , 'index']);
    Route::get('admin/countries/add' , [CountryController::class, 'add']);
    Route::post('admin/countries/add' , [CountryController::class, 'add_post']);
    Route::get('admin/countries/edit/{id}' , [CountryController::class, 'edit']);
    Route::post('admin/countries/edit/{id}' , [CountryController::class, 'edit_update']);
    Route::get('admin/countries/delete/{id}' , [CountryController::class, 'delete']);

    // Locations
    Route::get('admin/locations' , [LocationController::class , 'index']);
    Route::get('admin/locations/add' , [LocationController::class, 'add']);
    Route::post('admin/locations/add' , [LocationController::class, 'add_post']);
    Route::get('admin/locations/edit/{id}' , [LocationController::class, 'edit']);
    Route::post('admin/locations/edit/{id}' , [LocationController::class, 'edit_update']);
    Route::get('admin/locations/delete/{id}' , [LocationController::class, 'delete']);


    // Department
    Route::get('admin/departments' , [DepartmentController::class ,'index']);
    Route::get('admin/departments/add' , [DepartmentController::class, 'add']);
    Route::post('admin/departments/add' , [DepartmentController::class, 'add_post']);
    Route::get('admin/departments/edit/{id}' , [DepartmentController::class, 'edit']);
    Route::post('admin/departments/edit/{id}' , [DepartmentController::class, 'edit_update']);
    Route::get('admin/departments/delete/{id}' , [DepartmentController::class, 'delete']);

    // Manager
    Route::get('admin/manager' , [ManagerController::class , 'index']);
    Route::get('admin/manager/add' , [ManagerController::class, 'add']);
    Route::post('admin/manager/add' , [ManagerController::class, 'add_post']);
    Route::get('admin/manager/edit/{id}' , [ManagerController::class, 'edit']);
    Route::post('admin/manager/edit/{id}' , [ManagerController::class, 'edit_post']);
    Route::get('admin/manager/delete/{id}' , [ManagerController::class, 'delete']);

    // My account
    Route::get('admin/my_account', [MyAccountController::class , 'index']);
    Route::post('admin/my_account/update', [MyAccountController::class, 'update']);


    // Leave Application
    Route::get('admin/leave' , [LeaveController::class , 'leave']);
    Route::post('admin/leave/apply' , [LeaveController::class , 'apply']);


    // Permission
    Route::resource('admin/permissions' , PermissionController::class);
    Route::get('admin/permissions/delete/{permissionId}', [PermissionController::class, 'destroy']);
    // Role

    Route::resource('admin/roles' , RoleController::class);
    Route::get('admin/roles/delete/{roleId}', [RoleController::class,  'destroy'])->middleware('permission:delete role');
    Route::get('admin/roles/{roleId}/give-permissions' , [RoleController::class, 'addPermissionToRole']);
    Route::put('admin/roles/{roleId}/give-permissions' , [RoleController::class, 'givePermissionToRole']);


    // Attendance
    Route::get('admin/attendance' , [AttendanceController::class , 'index'])->name('attendance');

});



Route::get('logout', [AuthController::class, 'logout']);
