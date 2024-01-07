<?php

use App\Http\Controllers\DosenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/users', UserController::class);

Route::get('mahasiswa', [MahasiswaController::class , 'read']);
Route::get('mahasiswa/show/{id}', [MahasiswaController::class , 'show']);
Route::post('mahasiswa/store', [MahasiswaController::class , 'store']);
Route::put('mahasiswa/update/{id}', [MahasiswaController::class , 'update']);
Route::delete('mahasiswa/destroy/{id}', [MahasiswaController::class , 'destroy']);

Route::get('dosen', [DosenController::class , 'read']);
Route::get('dosen/show/{id}', [DosenController::class , 'show']);
Route::post('dosen/store', [DosenController::class , 'store']);
Route::put('dosen/update/{id}', [DosenController::class , 'update']);
Route::delete('dosen/destroy/{id}', [DosenController::class , 'destroy']);

Route::get('prodi', [ProdiController::class , 'read']);
Route::get('prodi/show/{id}', [ProdiController::class , 'show']);
Route::post('prodi/store', [ProdiController::class , 'store']);
Route::put('prodi/update/{id}', [ProdiController::class , 'update']);
Route::delete('prodi/destroy/{id}', [ProdiController::class , 'destroy']);

Route::get('matakuliah', [MataKuliahController::class , 'read']);
Route::get('matakuliah/show/{id}', [matakuliahController::class , 'show']);
Route::post('matakuliah/store', [matakuliahController::class , 'store']);
Route::put('matakuliah/update/{id}', [matakuliahController::class , 'update']);
Route::delete('matakuliah/destroy/{id}', [matakuliahController::class , 'destroy']);
