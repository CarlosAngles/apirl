<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', [AuthController::class, 'logout']);
});


use App\Http\Controllers\PersonaController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('personas', PersonaController::class);
    Route::get('user', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', [AuthController::class, 'logout']);
});
