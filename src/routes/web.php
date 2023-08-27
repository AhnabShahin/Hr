<?php

use Illuminate\Support\Facades\Route;
use Xpeedstudio\Hr\Controllers\JobController;
use Xpeedstudio\Hr\Controllers\RegionController;
use Xpeedstudio\Hr\Controllers\CountryController;
use Xpeedstudio\Hr\Controllers\EmployeeController;
use Xpeedstudio\Hr\Controllers\LocationController;
use Xpeedstudio\Hr\Controllers\DepartmentController;
use Xpeedstudio\Hr\Controllers\JobHistoryController;

// Route::get('hello', EmployeeController::class);

Route::resource('jobs', JobController::class);
Route::resource('regions', RegionController::class);
Route::resource('countries', CountryController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('locations', LocationController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('job-histories', JobHistoryController::class);