<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/belajar', function () {
//     $data['nama'] = 'Jekki';
//     $data['kelas'] = '11 RPL 2';
//     $data['jk'] = 'Laki-laki';
//     return view('belajar' , $data); //mengirim data ke view belajar.blade.php
// });

Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'store']);

Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/kelas', [KelasController::class, 'store']);

Route::get('/kelas/create', [KelasController::class, 'create']);

Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
Route::patch('/siswa/{id}', [SiswaController::class, 'update']);

Route::get('/Pelajar/{username}', [SiswaController::class, 'pelajarUsername']);

Route::get('/Pelajar/numeric/{id}', [SiswaController::class, 'pelajarNumeric'])->where('id', '[0-9]+'); //hanya menerima parameter angka saja dengan id

Route::get('/Pelajar/name/{name}', [SiswaController::class, 'pelajarName'])->where('name', '[A-Za-z]+'); //hanya menerima parameter huruf saja dengan name