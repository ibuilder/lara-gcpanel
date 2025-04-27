<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Modules\BIM\BIMController;
use App\Http\Controllers\Modules\Closeout\CloseoutController;
use App\Http\Controllers\Modules\Contracts\ContractsController;
use App\Http\Controllers\Modules\Cost\CostController;
use App\Http\Controllers\Modules\Engineering\EngineeringController;
use App\Http\Controllers\Modules\Field\FieldController;
use App\Http\Controllers\Modules\Preconstruction\PreconstructionController;
use App\Http\Controllers\Modules\Resources\ResourcesController;
use App\Http\Controllers\Modules\Safety\SafetyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Settings\UserController;
use App\Http\Controllers\Settings\CompanyController;
use App\Http\Controllers\Settings\DatabaseController;
use App\Http\Controllers\Settings\ProjectInfoController;

// Authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:sanctum');

// Module routes
Route::apiResource('bim', BIMController::class)->middleware('auth:sanctum');
Route::apiResource('closeout', CloseoutController::class)->middleware('auth:sanctum');
Route::apiResource('contracts', ContractsController::class)->middleware('auth:sanctum');
Route::apiResource('cost', CostController::class)->middleware('auth:sanctum');
Route::apiResource('engineering', EngineeringController::class)->middleware('auth:sanctum');
Route::apiResource('field', FieldController::class)->middleware('auth:sanctum');
Route::apiResource('preconstruction', PreconstructionController::class)->middleware('auth:sanctum');
Route::apiResource('resources', ResourcesController::class)->middleware('auth:sanctum');
Route::apiResource('safety', SafetyController::class)->middleware('auth:sanctum');

// Report routes
Route::get('/reports', [ReportController::class, 'index'])->middleware('auth:sanctum');

// User management routes
Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::post('/users', [UserController::class, 'store'])->middleware('auth:sanctum');
Route::get('/users/{user}', [UserController::class, 'show'])->middleware('auth:sanctum');
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth:sanctum');

// Company management routes
Route::get('/companies', [CompanyController::class, 'index'])->middleware('auth:sanctum');
Route::post('/companies', [CompanyController::class, 'store'])->middleware('auth:sanctum');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->middleware('auth:sanctum');
Route::put('/companies/{company}', [CompanyController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->middleware('auth:sanctum');

// Database settings routes
Route::get('/database', [DatabaseController::class, 'index'])->middleware('auth:sanctum');
Route::put('/database', [DatabaseController::class, 'update'])->middleware('auth:sanctum');

// Project info routes
Route::get('/project-info', [ProjectInfoController::class, 'index'])->middleware('auth:sanctum');
Route::put('/project-info', [ProjectInfoController::class, 'update'])->middleware('auth:sanctum');