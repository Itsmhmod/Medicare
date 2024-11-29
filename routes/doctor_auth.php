<?php

use App\Http\Controllers\doctor\Auth\RegisteredUserController;
use App\Http\Controllers\doctor\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('doctor')->middleware('guest:doctor')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('doctor.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('doctor.login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('doctor')->middleware('auth:doctor')->group(function () {

    Route::post('logout', [LoginController::class, 'destroy'])->name('doctor.logout');
});
