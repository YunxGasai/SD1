<?php

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

Route::get('/admin', function () {
    return view('placeholder', ['pageTitle' => __('messages.admin_subsystem')]);
})->name('admin.dashboard');
