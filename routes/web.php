<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\SupervisiController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/tambahNasabah', [CustomerServiceController::class, 'tambahNasabah'])->name('tambahNasabah');
Route::get('/dataNasabah', [CustomerServiceController::class, 'dataNasabah'])->name('dataNasabah');
Route::get('/dataNasabah/{id}', [CustomerServiceController::class, 'detailNasabah'])->name('detailNasabah');
Route::post('/store/dataNasabah', [CustomerServiceController::class, 'storeNasabah'])->name('storeNasabah');

Route::get('/nasabah', [SupervisiController::class, 'nasabahAll'])->name('nasabahAll');
Route::get('/nasabah/{id}', [SupervisiController::class, 'nasabahDetail'])->name('nasabahDetail');
Route::get('/nasabah/approve/{id}', [SupervisiController::class, 'approve'])->name('approve');
Route::get('/nasabah/reject/{id}', [SupervisiController::class, 'reject'])->name('reject');

Route::get('/cs/list', [SupervisiController::class, 'dataCs'])->name('dataCs');
Route::get('/cs/unblock/{id}', [SupervisiController::class, 'unblockCs'])->name('unblockCs');