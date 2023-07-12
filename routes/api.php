<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisTransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//auth
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/changerole',[AuthController::class, 'changeRole']);

//Barang
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/{id}', [BarangController::class, 'show']);
Route::post('/barang/delete/{id}', [BarangController::class, 'destroy']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::post('/barang', [BarangController::class, 'store']);


//pertanyaan
Route::get('/pertanyaan', [BantuanController::class, 'index']);
Route::get('/pertanyaan/{id}', [BantuanController::class, 'show']);
Route::post('/pertanyaan/delete/{id}', [BantuanController::class, 'destroy']);
Route::post('/pertanyaan/update/{id}', [BantuanController::class, 'update']);
Route::post('/pertanyaan', [BantuanController::class, 'store']);

//Jenis Transaksi
Route::get('/jenis-transaksi', [JenisTransaksiController::class, 'index']);
Route::get('/jenis-transaksi/{id}', [JenisTransaksiController::class, 'show']);
Route::post('/jenis-transaksi/delete/{id}', [JenisTransaksiController::class, 'destroy']);
Route::post('/jenis-transaksi/update/{id}', [JenisTransaksiController::class, 'update']);
Route::post('/jenis-transaksi', [JenisTransaksiController::class, 'store']);
