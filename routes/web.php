<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;

Route::pattern ('id', '[0-9]+'); // mendefinisikan pattern global untuk parameter 'id' agar hanya menerima angka

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('auth');

Route::middleware (['auth'])->group(function () {
    // semua route yang perlu autentikasi ditaruh di dalam group ini


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
    Route::middleware(['authorize:ADM'])->group(function () {
        Route::get('/level',[LevelController::class, 'index']);
        Route::post('/level/list',[LevelController::class,  'list']);
        Route::get('/level/create',[LevelController::class,  'create']);
        Route::post('/level',[LevelController::class,  'store']);
        Route::get('/level/create_ajax',[LevelController::class, 'create_ajax']);
        Route::post('/level/ajax',[LevelController::class, 'store_ajax']);
        Route::get('/level/{id}/edit_ajax',[LevelController::class,  'edit_ajax']);
        Route::put('/level/{id}/update_ajax',[LevelController::class,  'update_ajax']);
        Route::get('/level/{id}/delete_ajax',[LevelController::class,  'confirm_ajax']);
        Route::delete('/level/{id}/delete_ajax',[LevelController::class,  'destroy_ajax']);
        Route::get('/level/{id}',[LevelController::class,  'show']);
        Route::get('/level/{id}/edit',[LevelController::class,  'edit']);
        Route::put('/level/{id}',[LevelController::class,  'update']);
        Route::delete('/level/{id}',[LevelController::class,  'destroy']);
    });
    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::get('/kategori',[KategoriController::class, 'index']);
        Route::post('/kategori/list',[KategoriController::class, 'list']);
        Route::get('/kategori/create',[KategoriController::class, 'create']);
        Route::post('/kategori',[KategoriController::class, 'store']);
        Route::get('/kategori/{id}',[KategoriController::class, 'show']);
        Route::get('/kategori/{id}/edit',[KategoriController::class, 'edit']);
        Route::put('/kategori/{id}',[KategoriController::class, 'update']);
        Route::delete('/kategori/{id}',[KategoriController::class, 'destroy']);
    });
    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::get('/supplier',[SupplierController::class, 'index']);
        Route::post('/supplier/list',[SupplierController::class, 'list']);
        Route::get('/supplier/create',[SupplierController::class, 'create']);
        Route::post('/supplier',[SupplierController::class, 'store']);
        Route::get('/supplier/{id}',[SupplierController::class, 'show']);
        Route::get('/supplier/{id}/edit',[SupplierController::class, 'edit']);
        Route::put('/supplier/{id}',[SupplierController::class, 'update']);
        Route::delete('/supplier/{id}',[SupplierController::class, 'destroy']);
    });
    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::get('/barang',[BarangController::class, 'index']);
        Route::post('/barang/list',[BarangController::class, 'list']);
        Route::get('/barang/create',[BarangController::class, 'create']);
        Route::post('/barang',[BarangController::class, 'store']);
        Route::get('/barang/{id}',[BarangController::class, 'show']);
        Route::get('/barang/{id}/edit',[BarangController::class, 'edit']);
        Route::put('/barang/{id}',[BarangController::class, 'update']);
        Route::delete('/barang/{id}',[BarangController::class, 'destroy']);
        Route::get('/barang/import', [BarangController::class, 'import']);
        Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']);
        Route::get('/barang/export_excel', [BarangController::class, 'export_excel']);
        Route::get('/barang/export_pdf', [BarangController::class, 'export_pdf']);
    });


    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postregister'])->name('postregister');

    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/tambah', [UserController::class, 'tambah']);
    Route::get('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
    Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
    Route::get('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
    Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

    Route::get('/level', [LevelController::class, 'index']);
});