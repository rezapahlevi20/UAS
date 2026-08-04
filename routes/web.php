<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermintaanController;

Route::get('/', [LoginController::class,'index'])->name('login');

Route::post('/login', [LoginController::class,'proses'])->name('login.proses');

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class,'index'])
        ->name('admin.dashboard');

    Route::resource('barang', BarangController::class);

    Route::get('/admin/permintaan', [PermintaanController::class,'adminIndex'])
        ->name('admin.permintaan');

    Route::post('/admin/permintaan/{id}/setujui', [PermintaanController::class,'setujui'])
        ->name('permintaan.setujui');

    Route::post('/admin/permintaan/{id}/tolak', [PermintaanController::class,'tolak'])
        ->name('permintaan.tolak');



    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    Route::get('/user/dashboard', [UserController::class,'index'])
        ->name('user.dashboard');

    Route::get('/user/barang', [PermintaanController::class,'index'])
        ->name('user.barang');

    Route::get('/user/permintaan/{id}', [PermintaanController::class,'create'])
        ->name('permintaan.create');

    Route::post('/user/permintaan', [PermintaanController::class,'store'])
        ->name('permintaan.store');

    Route::get('/user/riwayat', [PermintaanController::class,'riwayat'])
        ->name('permintaan.riwayat');



    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [LoginController::class,'logout'])
        ->name('logout');

});