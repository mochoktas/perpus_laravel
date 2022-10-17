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

Route::get('/', function () {
    return view('welcome');
    
});

use App\Http\Controllers\CBlank;
Route::get('/home', [CBlank::class, 'index']);

Auth::routes();
use App\Http\Controllers\CLogout;
Route::get('/logout', [CLogout::class, 'perform']);
// Route::get('/logout', 'CLogout@perform')->name('logout.perform');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
use App\Http\Controllers\CStaff;
Route::get('/indexStaff', [CStaff::class, 'index']);
Route::get('/staff', [CStaff::class, 'tambah']);
Route::post('/staff/insertData', [CStaff::class, 'inserts']);
use App\Http\Controllers\CLokasi;
Route::get('/getKota',[CLokasi::class,'getKota']);
Route::get('/getKec',[CLokasi::class,'getKecamatan']);
Route::get('/getKel',[CLokasi::class,'getKelurahan']);
use App\Http\Controllers\CAnggota;
Route::get('/anggota', [CAnggota::class, 'index']);
Route::get('/tambahAnggota', [CAnggota::class, 'tambah']);
Route::post('/tambahAnggota/insertData', [CAnggota::class, 'inserts']);

use App\Http\Controllers\CPeminjaman;
Route::get('/peminjaman',[CPeminjaman::class,'index']);
Route::get('/peminjaman/tambahPeminjaman/{id}',[CPeminjaman::class,'tambah_peminjaman']);
Route::get('/getEks',[CPeminjaman::class,'getEksemplar']);
Route::post('/peminjaman/insertData', [CPeminjaman::class, 'inserts']);
Route::get('/info',[CPeminjaman::class,'index_anggota']);

use App\Http\Controllers\CPengembalian;
Route::get('/pengembalian',[CPengembalian::class,'index']);
Route::get('/pengembalian/detail/{id}',[CPengembalian::class,'det_pengembalian']);
Route::post('/pengembalian/insertData', [CPengembalian::class, 'inserts']);

use App\Http\Controllers\CPenerimaan;
Route::get('/penerimaan',[CPenerimaan::class,'index']);
Route::post('/penerimaan/insertAsal', [CPenerimaan::class, 'insertsAsal']);
Route::get('/penerimaan/tambahPenerimaan/{id}',[CPenerimaan::class,'tambah_penerimaan']);
Route::post('/penerimaan/insertData', [CPenerimaan::class, 'inserts']);
Route::post('/penerimaan/insertBuku', [CPenerimaan::class, 'insertsBuku']);