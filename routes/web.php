<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;


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


// Tambah User
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);

//Ubah User
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);

//Hapus User
Route::delete('/user/hapus/{id}', [UserController::class, 'hapus']);

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);        // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);    // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);       // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);     // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);   // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
});