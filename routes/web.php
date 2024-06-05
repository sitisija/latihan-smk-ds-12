<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Models\Siswa;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
//middleware(jadi jika mau masuk harus login dulu, jika diluar middleware maka tidak usah login)
Route::middleware(['auth.check'])->group(function(){
    //home
    Route::get('/',[HomeController::class,'index'])->name('home');
    // siswa
Route::get('/siswa',[SiswaController::class,'siswa'])->name('siswa');
Route::get('/siswa/tambah',[SiswaController::class,'tambah'])->name('siswa_tambah');
Route::post('/siswa/aksi_tambah',[SiswaController::class,'aksi_tambah'])->name('aksi_tambah_siswa');
Route::get('siswa/edit{id}',[SiswaController::class,'edit_siswa'])->name('edit_siswa');
Route::post('siswa/aksi_edit',[SiswaController::class,'aksi_edit_siswa'])->name('aksi_edit_siswa');
Route::get('siswa/hapus{id}',[SiswaController::class,'hapus_siswa'])->name('hapus_siswa');
Route::post('siswa/aksi_hapus{id}',[SiswaController::class,'aksi_hapus_siswa'])->name('aksi_hapus_siswa');
// kelas
Route::get('/kelas',[KelasController::class,'index'])->name('kelas');
Route::get('/kelas/tambah',[KelasController::class,'tambah'])
->name('tambah_kelas');
Route::post('kelas/aksi_tambah',[KelasController::class,'aksi_tambah'])
->name('aksi_tambah_kelas')
;
Route::get('kelas/edit/{id}',[KelasController::class,'edit'])
->name('edit')
;
Route::post('kelas/hapus/{id}',[KelasController::class,'hapus'])
->name('hapus_kelas')
;
Route::post('kelas/aksi_hapus/{id}',[KelasController::class,'hapus'])
->name('aksi_hapus')
;


Route::post('kelas/aksi_edit/{id}',[KelasController::class,'aksi_edit'])
->name('aksiedit');
//Nilai
Route::get('nilai',[NilaiController::class,'index'])->name('nilai');
Route::get('nilai/tambah',[NilaiController::class,'tambah'])->name('nilai_tambah');
Route::post('nilai/aksi_tambah', [NilaiController::class, 'aksi_tambah'])->name('aksi_tambah');
Route::post('nilai/hapus{id}',[NilaiController::class,'hapus'])->name('hapus_nilai');
Route::get('nilai/edit{id}',[NilaiController::class,'edit'])->name('nilai_edit');
Route::post('nilai/aksi_edit/{id}',[NilaiController::class,'aksi_edit'])->name('aksi_edit');
//profile
Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::post('aksi_edit_profile',[ProfileController::class,'aksi_edit_profile'])->name('aksi_edit_profile');
//logout
Route::get('logout',[AuthController::class,'logout'])->name('logout');

});

//pengguna(auth)
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'aksi_register'])->name('aksi_register');
//login
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'aksi_login'])->name('aksi_login');




