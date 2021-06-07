<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
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

Route::get('/', function () {
    return view('layouts.home');
});

Route::get('/home', function () {
    return view('layouts.home');
});

Route::get('/about', function () {
    return view('layouts.about');
});

Route::get('/salam', function () {
    return "Assalamualaikum brader, semangat belajar laravel8";
});

Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi) {
    return 'Nama Pegawai: '.$nama.'<br/>Departemen: ' .$divisi;
});

Route::get('/kabar', function () {
    return view('kondisi');
});

Route::get('/nilai', function () {
    return view('nilai');
});

Route::get('/daftarnilai', function () {
    return view('daftar_nilai');

// Route::resource('/pengarang', PengarangController::class);

Route::get(
    '/pengarang',
    [PengarangController::class, 'index']
);

Route::get(
    '/penerbit',
    [PenerbitController::class, 'index']
);
});
