<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [PageController::class, 'home'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Student Registration Routes
Route::prefix('register')->name('register.')->group(function () {
    Route::get('/sports', [RegistrationController::class, 'showForm'])->name('form');
    Route::post('/store', [RegistrationController::class, 'store'])->name('store');
    Route::get('/my-registrations', [RegistrationController::class, 'getUserRegistrations'])->name('my');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/registrations', [AdminController::class, 'registrationsBySort'])->name('registrations');
    Route::post('/approve/{id}', [AdminController::class, 'approve'])->name('approve');
    Route::post('/reject/{id}', [AdminController::class, 'reject'])->name('reject');
    Route::get('/export-csv', [AdminController::class, 'exportCSV'])->name('export');
});
