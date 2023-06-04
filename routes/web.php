<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/mahasiswa/nilai/{nim}',[MahasiswaController::class,'nilai']);
Route::resource('articles','App\Http\Controllers\ArticleController');
Route::get('/article/cetak_pdf',[ArticleController::class,'cetakPdf']);
Route::get('/mahasiswa/nilai/{nim}/cetak_pdf',[MahasiswaController::class,'cetakPDF']);

