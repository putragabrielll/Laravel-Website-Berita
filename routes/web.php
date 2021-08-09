<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
// Back End
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
// Front End
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Front_Berita_AllController;
// Untuk Penulis
use App\Http\Controllers\Penulis_ArtikelController;
use App\Http\Controllers\Penulis_MateriController;

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

// Route::get('/', function () {
//     return view('home');
// });

// Untuk Front end
Route::get('/', [FrontendController::class, 'index']);
Route::resource('/about', AboutController::class,);
Route::resource('/contact', ContactController::class,);
Route::resource('/berita-all', Front_Berita_AllController::class,);
Route::get('/detail-artikel/{slug}', [FrontendController::class, 'detail'])->name('detail-artikel');
Route::get('/artikel-kategori/{kategori}', [FrontendController::class, 'artikel_kategori'])->name('artikel-kategori');
Route::get('/materi-vidio/{slug}', [FrontendController::class, 'vidio'])->name('materi-vidio');
Route::get('/materi-playlist/{playlist}', [FrontendController::class, 'materi_playlist'])->name('materi-playlist');


// Untuk Back End

// Route::get('/admin', function () {
//     return view('auth.login_new');
// });

// ini untuk Authentifikasi login
Auth::routes();

// Hak Akses Admin
Route::group(['middleware' => ['auth','ceklevel:admin']], function() {
    // Untuk menu-menu di sidebar
    Route::resource('/kategori', KategoriController::class,);
    Route::resource('/artikel', ArtikelController::class,);
    Route::resource('/materi', MateriController::class,);
    Route::resource('/slide', SlideController::class,);
    Route::resource('/iklan', IklanController::class,);
});

// Untuk Akses Bersama
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/profile', ProfileController::class,);
    Route::resource('/password', PasswordController::class,);
    Route::resource('/kategori', KategoriController::class,);
    Route::resource('/playlist', PlaylistController::class,);
});


// Hak Akses Penulis
Route::group(['middleware' => ['auth','ceklevel:user, admin']], function() {
    Route::resource('/penulis_artikel', Penulis_ArtikelController::class,);
    Route::resource('/penulis_materi', Penulis_MateriController::class,);
});