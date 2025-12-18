<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Tambahan route untuk Obat
Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');

/*
|--------------------------------------------------------------------------
| OBAT ROUTES
|--------------------------------------------------------------------------
*/

// Search (GET)
Route::get('/obat/search', [ObatController::class, 'search'])->name('obat.search');

// Filter (GET)
Route::get('/obat/filter', [ObatController::class, 'filter'])->name('obat.filter');

// CRUD lengkap
Route::resource('obat', ObatController::class);

Route::get('/obat/export', [ObatController::class, 'export'])->name('obat.export');

