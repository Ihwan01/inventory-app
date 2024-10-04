<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BarangController::class, 'index']);

Route::resource('barangs', BarangController::class);

Route::get('/trashed', [BarangController::class, 'trashed'])->name('barangs.trashed');
Route::patch('/{id}/restore', [BarangController::class, 'restore'])->name('barangs.restore');
Route::delete('/{id}/forceDelete', [BarangController::class, 'forceDelete'])->name('barangs.forceDelete');
