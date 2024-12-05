<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminTanamanController;
use App\Http\Controllers\AdminHamaController;
use App\Http\Controllers\InformasiTanamanController;
use App\Http\Controllers\InformasiHamaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Route::get('/', function () {
    return view('welcome');
});


Route::get('halamandeteksi', function() {
    return view('riski');
})->name('halamandeteksi');


Route::resource('mengelolatanaman', AdminTanamanController::class);
Route::resource('mengelolahama', AdminHamaController::class);

Route::resource('informasitanaman', InformasiTanamanController::class);
Route::resource('informasihama', InformasiHamaController::class);


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Rute logout
    });


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

   
    Route::post('/check-username', [AuthController::class, 'checkUsername'])->name('check.username');
    Route::post('/check-email', [AuthController::class, 'checkEmail'])->name('check.email');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


if (app()->environment('local')) {
    Route::get('/create-admin', [AuthController::class, 'createAdmin']);
}


Route::get('pengguna', function() {
    return view('pengguna');
})->name('pengguna');

Route::get('dashboard', function() {
    return view('dashboard');
});

