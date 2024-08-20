<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.Dashboard');
});

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'Login']);
    Route::get('/register', [AuthController::class, 'Register']);
    Route::get('/logout', [AuthController::class, 'Logout'])->middleware(AdminMiddleware::class)->name('logout');
});

Route::prefix('/dashboard')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/', [AdminController::class, 'Dashboard']);
});