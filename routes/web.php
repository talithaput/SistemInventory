<?php

use Illuminate\Support\Facades\Route;

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

/*
    FRONTEND
*/
Route::get('/', function () {
    return view('auth.login');
})->name('login');

/*
    AUTHENTIFICATION
*/
Auth::routes();

/*
    BACKEND
*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/barang', [App\Http\Controllers\BarangController::class, 'index'])->name('barang');
    Route::get('/barang/create', [App\Http\Controllers\BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/store', [App\Http\Controllers\BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/edit{barang}', [App\Http\Controllers\BarangController::class, 'edit'])->name('barang.edit');
    Route::patch('/barang/update{barang}', [App\Http\Controllers\BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/destroy{barang}', [App\Http\Controllers\BarangController::class, 'destroy'])->name('barang.destroy');

    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::delete('/category/destroy{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/barang_masuk', [App\Http\Controllers\BarangMasukController::class, 'index'])->name('barang_masuk');
    Route::get('/barang_masuk/create', [App\Http\Controllers\BarangMasukController::class, 'create'])->name('barang_masuk.create');
    Route::post('/barang_masuk/store', [App\Http\Controllers\BarangMasukController::class, 'store'])->name('barang_masuk.store');
    Route::get('/barang_masuk/edit{barang_masuk}', [App\Http\Controllers\BarangMasukController::class, 'edit'])->name('barang_masuk.edit');
    Route::patch('/barang_masuk/update{barang_masuk}', [App\Http\Controllers\BarangMasukController::class, 'update'])->name('barang_masuk.update');
    Route::delete('/barang_masuk/destroy{barang_masuk}', [App\Http\Controllers\BarangMasukController::class, 'destroy'])->name('barang_masuk.destroy');
    Route::get('/cetak-laporan-masuk', [App\Http\Controllers\BarangMasukController::class, 'cetakLaporan'])->name('cetak-laporan-masuk');
    Route::get('/cetak-laporan-pertanggal-masuk/{tglawal}/{tglakhir}', [App\Http\Controllers\BarangMasukController::class, 'cetakLaporanPertanggal'])->name('cetak-laporan-pertanggal-masuk');

    Route::get('/barang_keluar', [App\Http\Controllers\BarangKeluarController::class, 'index'])->name('barang_keluar');
    Route::get('/barang_keluar/create', [App\Http\Controllers\BarangKeluarController::class, 'create'])->name('barang_keluar.create');
    Route::post('/barang_keluar/store', [App\Http\Controllers\BarangKeluarController::class, 'store'])->name('barang_keluar.store');
    Route::get('/barang_keluar/edit{barang_keluar}', [App\Http\Controllers\BarangKeluarController::class, 'edit'])->name('barang_keluar.edit');
    Route::patch('/barang_keluar/update{barang_keluar}', [App\Http\Controllers\BarangKeluarController::class, 'update'])->name('barang_keluar.update');
    Route::delete('/barang_keluar/destroy{barang_keluar}', [App\Http\Controllers\BarangKeluarController::class, 'destroy'])->name('barang_keluar.destroy');
    Route::get('/cetak-laporan-keluar', [App\Http\Controllers\BarangKeluarController::class, 'cetakLaporan'])->name('cetak-laporan-keluar');
    Route::get('/cetak-laporan-pertanggal-keluar/{tglawal}/{tglakhir}', [App\Http\Controllers\BarangKeluarController::class, 'cetakLaporanPertanggal'])->name('cetak-laporan-pertanggal-keluar');

    Route::get('/barang_rusak', [App\Http\Controllers\BarangRusakController::class, 'index'])->name('barang_rusak');
    Route::get('/barang_rusak/create', [App\Http\Controllers\BarangRusakController::class, 'create'])->name('barang_rusak.create');
    Route::post('/barang_rusak/store', [App\Http\Controllers\BarangRusakController::class, 'store'])->name('barang_rusak.store');
    Route::get('/barang_rusak/edit{barang_rusak}', [App\Http\Controllers\BarangRusakController::class, 'edit'])->name('barang_rusak.edit');
    Route::patch('/barang_rusak/update{barang_rusak}', [App\Http\Controllers\BarangRusakController::class, 'update'])->name('barang_rusak.update');
    Route::delete('/barang_rusak/destroy{barang_rusak}', [App\Http\Controllers\BarangRusakController::class, 'destroy'])->name('barang_rusak.destroy');
    Route::get('/cetak-laporan-rusak', [App\Http\Controllers\BarangRusakController::class, 'cetakLaporan'])->name('cetak-laporan-rusak');
    Route::get('/cetak-laporan-pertanggal-rusak/{tglawal}/{tglakhir}', [App\Http\Controllers\BarangRusakController::class, 'cetakLaporanPertanggal'])->name('cetak-laporan-pertanggal-rusak');
});