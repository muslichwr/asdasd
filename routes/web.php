<?php

use App\Http\Controllers\AplikasiEditController;
use App\Http\Controllers\data\EditAplikasiController;
use App\Http\Controllers\data\DetailAplikasiController;
use App\Http\Controllers\data\DetailEditAplikasiController;
use App\Http\Controllers\DokumenTatakelolaController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EditAplikasi;
use App\Http\Livewire\EditDetailAplikasi;
use Illuminate\Support\Facades\Auth;

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

/* Route::get('/dashboard', function () {
        return view('admin/dashboard');
}); */



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::get('/detailaplikasi', DetailAplikasiController::class)->name('detailaplikasi')->middleware('auth');
Route::get('/settingsicatat', function(){
        return view ('data.detailaplikasi.setting');
})->middleware('auth');
/*Route::get('editaplikasi/{id}', EditDetailAplikasi::class)->name('editAplikasi'); */
Route::get('/detailaplikasi/{aplikasi}/edit', [AplikasiEditController::class, 'edit'])->name('data.detailaplikasi.edit')->middleware('auth');
Route::get('/reportaplikasi', [ReportController::class, 'report'])->name('data.detailaplikasi.report')->middleware('auth');



Route::put('/aplikasis/{aplikasi}', [AplikasiEditController::class, 'update'])->name('aplikasis.update')->middleware('auth');
Route::get('/dropdown/cities/{country}', [AplikasiEditController::class, 'getCities'])->name('data.detailaplikasi.edit.dropdown');


Route::post('/detailaplikasi/{aplikasi}/upload', [AplikasiEditController::class, 'uploadDocument'])->name('data.detailaplikasi.upload');
Route::delete('/detailaplikasi/{aplikasi}/{dokumen}', [AplikasiEditController::class, 'deleteDocument'])->name('data.detailaplikasi.dokumen.delete');
Route::get('/detailaplikasi/{aplikasi}/dokumen/{dokumen}/download', [AplikasiEditController::class, 'downloadDocument'])->name('data.detailaplikasi.dokumen.download');



