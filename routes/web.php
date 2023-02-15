<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

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

Route::get('/', [PegawaiController::class, 'index'])->name('home');
Route::get('/tambahdata', [PegawaiController::class, 'create']);
Route::post('/kirim-data', [PegawaiController::class, 'store'])->name('kirim-data');

Route::get('/edit/{id}', [PegawaiController::class, 'edit'])->name('edit');
Route::patch('/ubah/{id}', [PegawaiController::class, 'update'])->name('ubah');
Route::delete('/hapus/{id}', [PegawaiController::class, 'destroy'])->name('delete');