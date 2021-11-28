<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Dashboard1Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\GambarController;

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

Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('adminHome')->middleware('is_admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('admins', App\Http\Controllers\AdminController::class);
Route::resource('absens', AbsenController::class);
Route::resource('rombels', RombelController::class);
Route::resource('rayons', RayonController::class);
Route::resource('students', StudentController::class);
Route::resource('dashboard1', Dashboard1Controller::class);
Route::resource('gambars', GambarController::class);

route::get('/presensi-masuk', [Dashboard1Controller::class,'index'])->name('presensi-masuk');
route::post('/simpan-masuk',[Dashboard1Controller::class,'store'])->name('simpan-masuk');
route::get('/simpan-keluar',[Dashboard1Controller::class,'keluar'])->name('simpan-keluar');
route::post('ubah-presensi',[Dashboard1Controller::class,'presensipulang'])->name('ubah-presensi');
route::get('dashboard1.keluar',[Dashboard1Controller::class,'keluar'])->name('dashboard1.keluar');
route::get('dashboard1.validasi',[Dashboard1Controller::class,'validasi'])->name('dashboard1.validasi');
route::get('dashboard1.selesaiValidasi',[Dashboard1Controller::class,'selesaiValidasi'])->name('dashboard1.selesaiValidasi');
route::post('dashboard1.beresvalidasi',[Dashboard1Controller::class,'beresvalidasi'])->name('dashboard1.beresvalidasi');
Route::get('/upload', [App\Http\Controllers\UploadController::class, 'upload']);
Route::post('/upload/proses', [App\Http\Controllers\UploadController::class, 'proses_upload']);
