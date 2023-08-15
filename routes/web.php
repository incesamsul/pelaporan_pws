<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\General;
use App\Http\Controllers\Home;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\Penilai;
use App\Http\Controllers\SasaranController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post('/postlogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', [LoginController::class, 'login']);


Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,pengelola_provinsi,pengelola_kabupaten,pimpinan']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
});

// KABUPATEN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:pengelola_kabupaten']], function () {
    Route::get('/sasaran', [SasaranController::class, 'kabupaten']);
    Route::post('/sasaran', [SasaranController::class, 'store']);
    Route::get('/indikator', [SasaranController::class, 'indikator']);
    Route::post('/indikator', [SasaranController::class, 'storeIndikator']);
});


// PROVINSI ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:pengelola_provinsi,pimpinan']], function () {
    Route::get('/report_pws', [SasaranController::class, 'report']);
});


// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);
        Route::get('/kabupaten', [KabupatenController::class, 'index']);
        Route::get('/sync_kabupaten', [KabupatenController::class, 'sync']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);
    });
});
