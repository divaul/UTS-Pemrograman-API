<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MahasiswaController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
    Route::get('/mahasiswa/nama/{nama}', [MahasiswaController::class, 'shiw']);
    Route::get('/mahasiswa/nim/{nim}', [MahasiswaController::class, 'shaw']);

});
