<?php

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
});
// Route::get('informasihama', function() {
//     return view('informasihama');
// });
// Route::get('informasitanaman', function() {
//     return view('informasitanaman');
// });
// Route::get('mengelolahama', function() {
//     return view('mengelolahama');
// });
// Route::get('mengelolatanaman', function() {
//     return view('mengelolatanaman');
// });
//pengguna biasa
Route::resource('informasitanaman', InformasiTanamanController::class);
Route::resource('informasihama', InformasiHamaController::class);

// admin
Route::resource('mengelolatanaman', AdminTanamanController::class);
Route::resource('mengelolahama', AdminHamaController::class);

Route::get('pengguna', function() {
    return view('pengguna');
});
Route::get('dashboard', function() {
    return view('dashboard');
});
