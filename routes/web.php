<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//Kategori
Route::get('/kategori', [KategoriController::class, 'index']);

//Level
Route::get('/level', [LevelController::class, 'index']);

// Home
Route::get('/home', [HomeController::class, 'index']);

// Products 
Route::get('/category/food', [ProductsController::class, 'food']);
Route::get('/category/beauty', [ProductsController::class, 'beauty']);
Route::get('/category/homeCare', [ProductsController::class, 'homeCare']);
Route::get('/category/babyKid', [ProductsController::class, 'babyKid']);

// User
//ute::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

// Penjualan
Route::get('/sales', [SalesController::class, 'index']);

// Daftar User
Route::get('/user', [UserController::class, 'index']);

// Tambah User
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);

//Ubah User
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);

//Hapus User
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
