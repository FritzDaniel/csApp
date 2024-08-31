<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


use App\Http\Controllers\KotaController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;

Route::apiResource('provinsi', ProvinsiController::class);
Route::apiResource('kota', KotaController::class);
Route::apiResource('kecamatan', KecamatanController::class);
Route::apiResource('kelurahan', KelurahanController::class);

Route::get('kota/get/{id}', [KotaController::class, 'getKotaByProvince']);
Route::get('kecamatan/get/{id}', [KecamatanController::class, 'getKecamatanByKota']);
Route::get('kelurahan/get/{id}', [KelurahanController::class, 'getKelurahanByKecamantan']);