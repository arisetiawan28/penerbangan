<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandaraController;
use App\Http\Controllers\PenerbanganController;


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

Route::resource('bandara', BandaraController::class);
Route::resource('penerbangan', PenerbanganController::class);
Route::get('/penerbangan/{id}/tambah_penumpang', [PenerbanganController::class, 'tambah_penumpang']);
Route::post('/penerbangan/{id}/store_penumpang', [PenerbanganController::class, 'store_penumpang']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
