<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);
    Route::post('/ajax', [UserController::class, 'store_ajax']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
Route::controller(LevelController::class)->group(function () {
    Route::get('/level', 'index');
    Route::post('/level/list', 'list');
    Route::get('/level/create', 'create');
    Route::post('/level', 'store');
    Route::get('/level/{id}', 'show');
    Route::get('/level/{id}/edit', 'edit');
    Route::put('/level/{id}', 'update');
    Route::delete('/level/{id}', 'destroy');
});
Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori', 'index');
    Route::post('/kategori/list', 'list');
    Route::get('/kategori/create', 'create');
    Route::post('/kategori', 'store');
    Route::get('/kategori/{id}', 'show');
    Route::get('/kategori/{id}/edit', 'edit');
    Route::put('/kategori/{id}', 'update');
    Route::delete('/kategori/{id}', 'destroy');
});
Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier', 'index');
    Route::post('/supplier/list', 'list');
    Route::get('/supplier/create', 'create');
    Route::post('/supplier', 'store');
    Route::get('/supplier/{id}', 'show');
    Route::get('/supplier/{id}/edit', 'edit');
    Route::put('/supplier/{id}', 'update');
    Route::delete('/supplier/{id}', 'destroy');
});
Route::controller(BarangController::class)->group(function () {
    Route::get('/barang', 'index');
    Route::post('/barang/list', 'list');
    Route::get('/barang/create', 'create');
    Route::post('/barang', 'store');
    Route::get('/barang/{id}', 'show');
    Route::get('/barang/{id}/edit', 'edit');
    Route::put('/barang/{id}', 'update');
    Route::delete('/barang/{id}', 'destroy');
});



Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::get('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::get('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

Route::get('/level', [LevelController::class, 'index']);