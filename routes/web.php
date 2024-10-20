<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});
Route::get('tes', function() {
    return view('riski');
});
