<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\KelasAktivitasController;
use App\Http\Controllers\OrasiIlmiahController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PendampingController;
use App\Http\Controllers\PengembanganBahanAjarController;
use App\Http\Controllers\PengembanganPKController;
use App\Http\Controllers\PengujiController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\TugasAkhirController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\JabatanController;
use App\Models\OrasiIlmiah;
use App\Models\Pendamping;
use App\Models\PengembanganPK;
use App\Models\Seminar;
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
Route::get('/', [UserDataController::class, 'index']);
Route::get('/aktivitas', [AktivitasController::class, 'index']);
Route::get('/aktivitas/detail/{id}', [AktivitasController::class, 'details'])->name('detail-aktivitas');
Route::get('/aktivitas/delete/{id}', [AktivitasController::class, 'delete'])->name('delete-aktivitas');

Route::get('/seminar', [SeminarController::class, 'index']);
Route::get('/seminar/delete/{id}', [SeminarController::class, 'delete'])->name('seminar.delete');

Route::get('/tugas-akhir', [TugasAkhirController::class, 'index']);
Route::get('/tugas-akhir/delete/{id}', [TugasAkhirController::class, 'delete'])->name('tugasakhir.delete');

Route::get('/pendamping', [PendampingController::class, 'index']);
Route::get('/pendamping/delete/{id}', [PendampingController::class, 'delete'])->name('pendamping.delete');

Route::get('/penguji', [PengujiController::class, 'index']);
Route::get('/penguji/delete/{id}', [PengujiController::class, 'delete'])->name('penguji.delete');

Route::get('/pembimbing', [PembimbingController::class, 'index']);
Route::get('/pembimbing/delete/{id}', [PembimbingController::class, 'delete'])->name('pembimbing.delete');

Route::get('/pengembangan-pk', [PengembanganPKController::class, 'index']);
Route::get('/pengembangan-pk/delete/{id}', [PengembanganPKController::class, 'delete'])->name('pengembanganpk.delete');

Route::get('/pengembangan-ba', [PengembanganBahanAjarController::class, 'index']);
Route::get('/pengembangan-ba/delete/{id}', [PengembanganBahanAjarController::class, 'delete'])->name('pengembanganbahanajar.delete');

Route::get('/orasi', [OrasiIlmiahController::class, 'index']);
Route::get('/orasi/delete/{id}', [OrasiIlmiahController::class, 'delete'])->name('orasiilmiah.delete');

Route::get('/login', [AuthController::class, 'index']);

Route::get('/jabatan', [JabatanController::class, 'index']);
Route::get('/jabatan/delete/{id}', [JabatanController::class, 'delete'])->name('jabatan.delete');


Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');
Route::get('logout', [AuthController::class, 'actionLogout'])->name('logout');


Route::post('/add-aktivitas', [AktivitasController::class, 'store'])->name('add-aktivitas');
Route::post('/aktivitas/add-kelas', [KelasAktivitasController::class, 'store'])->name('add-kelas');
Route::post('/aktivitas/update-aktivitas', [AktivitasController::class, 'update'])->name('update-aktivitas');


Route::post('/seminar/add-seminar', [SeminarController::class, 'store'])->name('add-seminar');

Route::post('/pendamping/add-pendamping', [PendampingController::class, 'store'])->name('add-pendamping');

Route::post('/tugas-akhir/add-ta', [TugasAkhirController::class, 'store'])->name('add-ta');

Route::post('/penguji/add-penguji', [PengujiController::class, 'store'])->name('add-penguji');


Route::post('/pembimbing/add-pembimbing', [PembimbingController::class, 'store'])->name('add-pembimbing');

Route::post('/pengembangan-pk/add-pengembangan-pk', [PengembanganPKController::class, 'store'])->name('add-pengembangan-pk');

Route::post('/pengembangan-ba/add-pengembangan-ba', [PengembanganBahanAjarController::class, 'store'])->name('add-pengembangan-ba');

Route::post('/orasi/add-orasi', [OrasiIlmiahController::class, 'store'])->name('add-orasi');

Route::post('/jabatan/add-jabatan', [JabatanController::class, 'store'])->name('add-jabatan');