<?php

use App\Http\Controllers\AplikasiEditController;
use App\Http\Controllers\data\EditAplikasiController;
use App\Http\Controllers\data\DetailAplikasiController;
use App\Http\Controllers\data\DetailEditAplikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EditAplikasi;
use App\Http\Livewire\EditDetailAplikasi;

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


Route::get('/detailaplikasi', DetailAplikasiController::class)->name('detailaplikasi');
/*Route::get('editaplikasi/{id}', EditDetailAplikasi::class)->name('editAplikasi'); */
Route::get('/detailaplikasi/{aplikasi}/edit', [AplikasiEditController::class, 'edit'])->name('data.detailaplikasi.edit');
Route::put('/aplikasis/{aplikasi}', [AplikasiEditController::class, 'update'])->name('aplikasis.update');
Route::get('/dropdown/cities/{country}', [AplikasiEditController::class, 'getCities'])->name('data.detailaplikasi.edit');









