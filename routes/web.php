<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;

use App\Http\Controllers\PelangganController;

use App\Http\Controllers\PengirimanController;

use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::resource('barang', BarangController::class);

    Route::resource('pelanggan', PelangganController::class);
        
    Route::resource('transaksi', TransaksiController::class);
        
    Route::get('barang/laporan/cetak',[BarangController::class, 'laporan']);
        
    Route::get('pelanggan/laporan/cetak',[PelangganController::class, 'laporan']);
        
    Route::get('transaksi/laporan/cetak',[TransaksiController::class, 'laporan']);
    
    Route::get('pengantaran/laporan/cetak',[TransaksiController::class, 'laporan']);

    Route::get('barang/cari/data',[BarangController::class, 'cari']);
        
    Route::get('pelanggan/cari/data',[PelangganController::class, 'cari']);
        
    Route::get('transaksi/cari/data',[TransaksiController::class, 'cari']);

    Route::get('pengantaran/cari/data',[TransaksiController::class, 'cari']);
        
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
