<?php

use Illuminate\Support\Facades\Route;

// Halaman utama (mainpage sebagai halaman utama)
Route::get('/', function () {
    return view('mainpage');
});

// Halaman ucapan setelah amplop dibuka
Route::get('/ucapan', function () {
    return view('ucapan');
})->name('ucapan');
