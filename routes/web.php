<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminTanamanController;
use App\Http\Controllers\AdminHamaController;
use App\Http\Controllers\InformasiTanamanController;
use App\Http\Controllers\InformasiHamaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk admin dengan middleware admin
Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/pengguna', [DashboardController::class, 'pengguna'])->name('admin.pengguna');
    Route::get('admin/mengelolatanaman', [AdminTanamanController::class, 'mengelolatanaman'])->name('admin.mengelolatanaman');
    Route::get('admin/mengelolahama', [AdminHamaController::class, 'mengelolahama'])->name('admin.mengelolahama');
});

// Rute untuk user dengan middleware user
    Route::group(['middleware' => 'user'], function () {
    Route::get('/user/halamandeteksi', [UserController::class, 'halamanDeteksi'])->name('user.halamandeteksi');
    Route::get('/user/informasitanaman', [InformasiTanamanController::class, 'informasitanaman'])->name('user.informasitanaman');
    Route::get('/user/informasihama', [InformasiHamaController::class, 'informasihama'])->name('user.informasihama');
});


// Rute untuk login dan registrasi
Route::get('login', [AuthController::class, 'login'])->name('login'); 
Route::post('login', [AuthController::class, 'login_post'])->name('login.post');
Route::get('daftar', [AuthController::class, 'daftar'])->name('daftar');
Route::post('daftar', [AuthController::class, 'daftar_post'])->name('daftar.post');



