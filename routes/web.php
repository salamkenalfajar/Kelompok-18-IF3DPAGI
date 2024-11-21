<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});
Route::get('halamandeteksi', function() {
    return view('riski');
});
Route::get('informasihama', function() {
    return view('informasihama');
});
Route::get('informasitanaman', function() {
    return view('informasitanaman');
});
Route::get('mengelolahama', function() {
    return view('mengelolahama');
});
Route::get('mengelolatanaman', function() {
    return view('mengelolatanaman');
});
Route::get('pengguna', function() {
    return view('pengguna');
});
Route::get('dashboard', function() {
    return view('dashboard');
});
Route::get('daftar', function() {
    return view('daftar');
});
Route::get('login', function() {
    return view('login');
});
Route::get('pricing', function() {
    return view('pricing');
});
Route::get('home', function() {
    return view('home');
});
