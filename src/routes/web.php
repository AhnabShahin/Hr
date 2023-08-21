<?php

use Illuminate\Support\Facades\Route;
use Xpeedstudio\Hr\Controllers\DepartmentController;
use Xpeedstudio\Hr\Controllers\EmployeeController;

// Route::get('hello', EmployeeController::class);

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);