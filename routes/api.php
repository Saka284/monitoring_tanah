<?php

use App\Http\Controllers\SensorController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('getToken', [AuthenticatedSessionController::class, 'getToken']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/sensor-data', [SensorController::class, 'store']);
});
