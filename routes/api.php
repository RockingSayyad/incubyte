<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::apiResource('employees', EmployeeController::class);

// Salary calculation endpoint
Route::get('/employees/{id}/salary', [EmployeeController::class, 'salary']);

// Salary metrics endpoint
Route::get('/salary/metrics', [EmployeeController::class, 'metrics']);