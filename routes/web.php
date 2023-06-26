<?php

use App\Http\Controllers\data\DetailAplikasiController;
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

/* Route::get('/dashboard', function () {
        return view('admin/dashboard');
}); */



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::get('/detailaplikasi', DetailAplikasiController::class)->name('detailaplikasi.aplikasi');
