<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeecontroller;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    // Employee Management
    Route::get('employee', [\App\Http\Controllers\employeecontroller::class, 'index'])->name('employee.index');
    //end of employee management

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'create'])->name('employee.create');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'store'])->name('employee.store');

    Route::get('create', [\App\Http\Controllers\ProfileController::class, 'create'])->name('employee.create');
    Route::post('store', [\App\Http\Controllers\ProfileController::class, 'store'])->name('employee.store');
});
