<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('auth', [AuthController::class, 'auth'])->name('auth');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::get('admin', [AdminController::class, 'index'])->name('admin')->middleware('role:admin');
Route::get('user', [UserController::class, 'index'])->name('user')->middleware('role:user');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('verify/{id}/{hash}', [AuthController::class, 'verify'])->name('verification.verify');
