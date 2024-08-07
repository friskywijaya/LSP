<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;

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

Route::get('/', [LoginController::class,'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/profile', [MahasiswaController::class,'index']);
Route::get('/akun', [MahasiswaController::class,'index2']);
Route::get('/datamhs', [MahasiswaController::class,'index3']);
Route::get('/pengajuan', [MahasiswaController::class,'index4']);
Route::get('/daftar', [MahasiswaController::class,'create']);
Route::post('/storemhs', [MahasiswaController::class,'storemhs']);
Route::post('/update-status/{id}', [MahasiswaController::class, 'updateStatus'])->name('updateStatus');

Route::get('/dashboard', [PengumumanController::class,'index']);
Route::get('/pengumuman', [PengumumanController::class,'create']);
Route::post('/storepengumuman', [PengumumanController::class,'storepengumuman']);

Route::get('/{id}/edit', [PengumumanController::class, 'edit']);
Route::put('/{id}', [PengumumanController::class, 'update']);
Route::delete('/{id}', [PengumumanController::class, 'destroy']);

Route::get('/akun/{id}', [MahasiswaController::class, 'show']);
Route::post('/akun/{id}', [MahasiswaController::class, 'update']);
