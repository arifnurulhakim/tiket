<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\WahanaController;
use App\Http\Controllers\KuponController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\GaleriController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('users', UserController::class);

   // Define the specific routes manually
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
Route::post('/fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
Route::get('/fasilitas/{fasilitas}', [FasilitasController::class, 'show'])->name('fasilitas.show');
Route::get('/fasilitas/{fasilitas}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
Route::put('/fasilitas/{fasilitas}', [FasilitasController::class, 'update'])->name('fasilitas.update');
Route::delete('/fasilitas/{fasilitas}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

Route::get('/wahana', [WahanaController::class, 'index'])->name('wahana.index');
Route::get('/wahana/create', [WahanaController::class, 'create'])->name('wahana.create');
Route::post('/wahana', [WahanaController::class, 'store'])->name('wahana.store');
Route::get('/wahana/{wahana}', [WahanaController::class, 'show'])->name('wahana.show');
Route::get('/wahana/{wahana}/edit', [WahanaController::class, 'edit'])->name('wahana.edit');
Route::put('/wahana/{wahana}', [WahanaController::class, 'update'])->name('wahana.update');
Route::delete('/wahana/{wahana}', [WahanaController::class, 'destroy'])->name('wahana.destroy');


Route::get('/rating/create', [RatingController::class, 'create'])->name('rating.create');
Route::get('/rating/{rating}', [RatingController::class, 'show'])->name('rating.show');
Route::get('/rating/{rating}/edit', [RatingController::class, 'edit'])->name('rating.edit');
Route::put('/rating/{rating}', [RatingController::class, 'update'])->name('rating.update');
Route::delete('/rating/{rating}', [RatingController::class, 'destroy'])->name('rating.destroy');


Route::get('pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::get('/pemesanan/{pemesanan}', [PemesananController::class, 'show'])->name('pemesanan.show');
Route::delete('pemesanan', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');

    Route::resource('galeri', GaleriController::class);
   
    Route::resource('kupon', KuponController::class);
 

    // Add other routes here, if any.
});

Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');

Route::resource('aspirasi', \App\Http\Controllers\AspirasiController::class);
Route::resource('kategori', \App\Http\Controllers\KategoriController::class);
Route::resource('images', 'ImageController');

Route::get('FormPemesanan', [PemesananController::class, 'form'])->name('pemesanan.form');
// Route::get('TiketPemesanan', [PemesananController::class, 'tiket'])->name('pemesanan.tiket');
Route::post('TiketPemesanan', [PemesananController::class, 'tiket'])->name('pemesanan.tiket');
Route::post('pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
// Route::get('FormPembayaran', [PemesananController::class, 'bayar'])->name('pemesanan.bayar');
