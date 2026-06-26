<?php

use App\Http\Controllers\Print\PrintController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('print')->name('print.')->middleware(['auth'])->group(function () {
    Route::get('/mahasiswa', [PrintController::class, 'mahasiswa'])->name('mahasiswa');
    Route::get('/ukm', [PrintController::class, 'ukm'])->name('ukm');
    Route::get('/anggota', [PrintController::class, 'anggota'])->name('anggota');
    Route::get('/anggota/ukm/{ukm}', [PrintController::class, 'anggotaByUKM'])->name('anggota-by-ukm');
});
