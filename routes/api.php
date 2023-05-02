<?php

use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\BarangMasukController;
use App\Http\Controllers\API\BarangKeluarController;
use App\Http\Controllers\API\BarangRusakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('barang', BarangController::class);
Route::post('/barang/{id}',[BarangController::class,'update']);
Route::resource('category',CategoryController::class);
Route::resource('barang_masuk', BarangMasukController::class);
Route::post('/barang_masuk/{id}',[BarangMasukController::class,'update']);
Route::resource('barang_keluar', BarangKeluarController::class);
Route::post('/barang_keluar/{id}',[BarangKeluarController::class,'update']);
Route::resource('barang_rusak', BarangRusakController::class);
Route::post('/barang_rusak/{id}',[BarangRusakController::class,'update']);