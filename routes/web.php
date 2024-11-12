<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RemoteControllController;
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('auth/login');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [SensorController::class, 'index'])->name('dashboard');
    Route::get('/remoteControll', [RemoteControllController::class, 'index'])->name('remoteControll');
    Route::get('/chart/{type}', [SensorController::class, 'chart']);
    Route::get('/getLatestMonitoring', [SensorController::class, 'getLatestMonitoring']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
