<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\GuestsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('/destinations', [HomeController::class, 'destinations'])->name('destinations');
Route::get('/destinations/{id}', [HomeController::class, 'viewDestination'])->name('view-destination');
Route::post('/destinations/{id}/testimony', [HomeController::class, 'storeTestimony'])->name('store-testimony');

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

    Route::prefix('/vendor')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('vendor.index');
        Route::get('/detail/{id}', [CompanyController::class, 'show'])->name('vendor.show');
        Route::get('/create', [CompanyController::class, 'create'])->name('vendor.create');
        Route::post('/store', [CompanyController::class, 'store'])->name('vendor.store');
        Route::get('/{id}/edit', [CompanyController::class, 'edit'])->name('vendor.edit');
        Route::put('/{id}/update', [CompanyController::class, 'update'])->name('vendor.update');
        Route::get('/delete/{id}', [CompanyController::class, 'destroy'])->name('vendor.destroy');
    });
});