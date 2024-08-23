<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get-regencies/{province_id}', [\App\Http\Controllers\LocationController::class, 'getRegencies']);
Route::get('/get-districts/{regency_id}', [\App\Http\Controllers\LocationController::class, 'getDistricts']);
Route::get('/get-villages/{district_id}', [\App\Http\Controllers\LocationController::class, 'getVillages']);


Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'Login']);
    Route::post('/login', [AuthController::class, 'LoginAction'])->name('login');
    Route::get('/register', [AuthController::class, 'Register']);
    Route::get('/logout', [AuthController::class, 'Logout'])->middleware(AdminMiddleware::class)->name('logout');
});

Route::prefix('/dashboard')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/', [AdminController::class, 'Dashboard'])->name('dashboard');
    Route::prefix('/destinations')->group(function () {
        Route::get('/', [DestinationController::class, 'index'])->name('destinations.index');
        Route::get('/detail/{id}', [DestinationController::class, 'show'])->name('destinations.show');
        Route::get('/create', [DestinationController::class, 'create'])->name('destinations.create');
        Route::post('/store', [DestinationController::class, 'store'])->name('destinations.store');
        Route::get('/{id}/edit', [DestinationController::class, 'edit'])->name('destinations.edit');
        Route::post('/{id}/update', [DestinationController::class, 'update'])->name('destinations.update');
        Route::get('/delete/{id}', [DestinationController::class, 'destroy'])->name('destinations.destroy');
        Route::get('/delete/image/{id}', [DestinationController::class, 'deleteImage'])->name('destinations.delete.image');
    });
});