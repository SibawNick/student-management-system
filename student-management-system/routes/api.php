<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\EnquiryController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('company', CompanyController::class);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('enquiries', EnquiryController::class);
});


Route::apiResource('student', StudentController::class);


// Global
// Authentication Routes
Route::post("register", [AuthController::class, 'register']);
Route::post("login", [AuthController::class, 'login']);
