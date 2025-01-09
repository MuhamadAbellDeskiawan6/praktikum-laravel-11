<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
Route::resource('/units', \App\Http\Controllers\UnitController::class);
Route::resource('/customers', \App\Http\Controllers\CustomerController::class);

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
