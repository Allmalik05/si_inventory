<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BarangseedController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BarangkeluarController;


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

// Route::resource('barang',BarangController::class);

// ROUTE HALAMAN BARANG
Route::resource('barang', BarangController::class)->middleware('auth');
// Route::resource('barang', BarangController::class)->middleware('auth');

// ROUTE HALAMAN SISWA
Route::resource('siswa', SiswaController::class)->middleware('auth');

// ROUTE LOGIN
Route::get('login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('loginAction', [LoginController::class,'authenticate']);


// ROUTE LOGOUT
Route::get('logout', [LoginController::class,'logout']);
Route::post('logout', [LoginController::class,'logout']);

// ROUTE REGISTER
Route::get('/register', [RegisterController::class,'create']);
Route::post('register', [RegisterController::class,'store']);

// Route::get('/dashboard',[DashboardController::class,'index']);

// ROUTE KATEGORI
Route::resource('kategori', KategoriController::class)->middleware('auth');

// ROUTE BARANG SEEDER
Route::resource('barangseed', BarangseedController::class)->middleware('auth');

// ROUTE BARANG MASUK
Route::resource('barangmasuk', BarangmasukController::class)->middleware('auth');

// ROUTE BARANG KELUAR
Route::resource('barangkeluar', BarangkeluarController::class)->middleware('auth');