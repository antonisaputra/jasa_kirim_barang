<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\Pengiriman;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\TujuanController;
use App\Http\Controllers\UserController;
use App\Models\Muatan;
use App\Models\Tujuan;
use Illuminate\Support\Facades\Auth;
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


Route::group(['middleware' => ['checklogin']], function () {
    Route::get('/', function(){
        return view('index');
    });
    
    Route::get('/muatan', [PengirimanController::class, 'index']);
    Route::get('/tambah_muatan',[PengirimanController::class, 'tambah_muatan']);
    Route::post('/tambah_muatan',[PengirimanController::class, 'aksi_tambah_muatan']);
    Route::get('/edit_muatan/{muatan:id}', [PengirimanController::class, 'edit_muatan']);
    Route::put('/edit_muatan/{muatan:id}', [PengirimanController::class, 'aksi_edit_muatan']);
    Route::get('/delete_muatan/{muatan:id}',[PengirimanController::class, 'delete_muatan']);
    
    // tujuan
    Route::get('/tujuan/{muatan:id}',[TujuanController::class, 'index']);
    Route::get('/tambah_pengiriman/{muatan:id}', [TujuanController::class, 'view_tambah_pengiriman']);
    Route::post('/tambah_pengiriman/{muatan:id}', [TujuanController::class, 'aksi_tambah_pengiriman']);
    Route::get('/edit_pengiriman/{tujuan:id}', [TujuanController::class, 'view_edit_pengiriman']);
    Route::put('/edit_pengiriman/{tujuan:id}', [TujuanController::class, 'aksi_edit_pengiriman']);
    Route::get('/delete_pengiriman/{tujuan}', [TujuanController::class, 'delete_pengiriman']);
    
    // Barang
    Route::get('/barang/{tujuan:id}', [BarangController::class, 'index']);
    Route::get('/tambah_barang/{tujuan:id}', [BarangController::class, 'tambah_barang']);
    Route::post('/tambah_barang/{tujuan:id}', [BarangController::class, 'aksi_tambah_barang']);
    Route::get('/edit_barang/{barang:id}', [BarangController::class, 'edit_barang']);
    Route::put('/edit_barang/{barang:id}', [BarangController::class, 'aksi_edit_barang']);
    Route::get('/hapus_barang/{barang:id}', [BarangController::class, 'hapus_barang']);
    // laporan
    Route::get('/laporan', [LaporanController::class, 'index']);
    
    // user
    Route::get('/user',[UserController::class, 'index']);
    Route::get('/user/tambah', [UserController::class, 'tambah']);
    Route::post('/user/tambah', [UserController::class, 'store']);
    Route::get('/user/edit/{user:id}',[UserController::class, 'edit']);
    Route::put('/user/edit/{user:id}',[UserController::class, 'aksi_edit']);
    Route::get('/user/password/{user:id}',[UserController::class, 'edit_password']);
    Route::put('/user/password/{user:id}',[UserController::class, 'aksi_edit_password']);
    Route::get('/user/delete/{user:id}', [UserController::class, 'delete']);    
});

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/nota/{tujuan:id}', [NotaController::class, 'index']);

