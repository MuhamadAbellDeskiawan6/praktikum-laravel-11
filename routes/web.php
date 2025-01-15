<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
Route::resource('/units', \App\Http\Controllers\UnitController::class);
Route::resource('/customers', \App\Http\Controllers\CustomerController::class);

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::get('printpdf', [UserController::class, 'printPDF'])->name('printuser');
Route::get('printexcel', [UserController::class, 'userExcel'])->name('exportuser');
Route::get('printpdfcategories', [CategoryController::class, 'printPDFcategories'])->name('printcategories');
Route::get('categoriesexcel', [CategoryController::class, 'categoriesExcel'])->name('exportcategories');
Route::get('printpdfproducts', [ProductController::class, 'printPDFproducts'])->name('printproducts');
Route::get('productsexcel', [ProductController::class, 'productsExcel'])->name('exportproducts');
