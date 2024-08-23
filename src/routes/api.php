<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;

Route::apiResource('reviews', ReviewController::class);

Route::apiResource('user', UserController::class);

// Route::apiResource('address', ReviewController::class);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/graphql', [ReviewController::class, 'handle']);
});