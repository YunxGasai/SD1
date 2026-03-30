<?php

use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('client')->name('client.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/conferences/{id}', [ClientController::class, 'show'])->name('conferences.show');
    Route::get('/conferences/{id}/register', [ClientController::class, 'registerForm'])->name('conferences.register');
    Route::post('/conferences/{id}/register', [ClientController::class, 'registerStore'])->name('conferences.register.store');
});

Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/conferences/{id}', [EmployeeController::class, 'show'])->name('conferences.show');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::resource('conferences', ConferenceController::class)->parameters(['conferences' => 'id']);
});
