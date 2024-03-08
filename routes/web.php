<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MasalahKulitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\TipeKulitController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/user', userController::class);
    Route::resource('/tipe-kulit', TipeKulitController::class);
    Route::resource('/brand', BrandController::class);
    Route::resource('/masalah-kulit', MasalahKulitController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/rekomendasi', RekomendasiController::class);
    Route::post('/user/reset-password', [userController::class, 'resetPasswordAdmin'])->name('user.password');
});

Route::controller(authController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::middleware('web')->group(function () {
    // Rute lainnya di sini
    Route::post('/rekomendasi/cbf', [RekomendasiController::class, 'saveRecommendations'])->name('rekomendasi.cbf');
});

Route::get('/rekomendasi/getData', [RekomendasiController::class, 'getData'])->name('rekomendasi.getData');

Route::resource('/register', RegisterController::class)->middleware('guest');
