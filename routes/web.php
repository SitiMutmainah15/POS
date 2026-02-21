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
Route::get('/category/food-beverage', [ProductsController::class, 'foodBeverage']);
Route::get('/category/beauty-health', [ProductsController::class, 'beautyHealth']);
Route::get('/category/home-care', [ProductsController::class, 'homeCare']);
Route::get('/category/baby-kid', [ProductsController::class, 'babyKid']);

// User
Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

// Penjualan
Route::get('/sales', [SalesController::class, 'index']);