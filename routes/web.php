<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;

Route::get('/', function () {
    return view('welcome');
});

// Home
Route::get('/home', [HomeController::class, 'index']);

// Products 
Route::get('/category/food', [ProductsController::class, 'food']);
Route::get('/category/beauty', [ProductsController::class, 'beauty']);
Route::get('/category/homeCare', [ProductsController::class, 'homeCare']);
Route::get('/category/babyKid', [ProductsController::class, 'babyKid']);

// User
Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

// Penjualan
Route::get('/sales', [SalesController::class, 'index']);