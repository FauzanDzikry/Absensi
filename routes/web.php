<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\KetController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;



Route::get('/', function () {
    return view('welcome');
});


route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth','ceklevel:admin,karyawan']], function () {
    route::get('/home',[HomeController::class,'index'])->name('home');    
});


Route::group(['middleware' => ['auth','ceklevel:karyawan']], function () {
    route::post('/simpan-masuk',[PresensiController::class,'kirim'])->name('simpan-masuk');
    route::get('/presensi-masuk',[PresensiController::class,'masuk'])->name('presensi-masuk');  
    route::get('/presensi-keluar',[PresensiController::class,'keluar'])->name('presensi-keluar'); 
    Route::post('ubah-presensi',[PresensiController::class,'presensipulang'])->name('ubah-presensi');
    Route::get('filter-data',[PresensiController::class,'halamanrekap'])->name('filter-data'); 
    Route::get('filter-data/{tglawal}/{tglakhir}',[PresensiController::class,'tampildatakeseluruhan'])->name('filter-data-keseluruhan'); 
});
Route::group(['middleware' => ['auth','ceklevel:karyawan,admin']], function () {
    Route::resource('kets', KetController::class);
    route::get('/kets',[KetController::class,'index'])->name('kets'); 
});
Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    Route::resource('Presensi', PresensiController::class);
    
    Route::resource('rayon', RayonController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('rombel', RombelController::class);
    Route::resource('siswa', SiswaController::class);
});