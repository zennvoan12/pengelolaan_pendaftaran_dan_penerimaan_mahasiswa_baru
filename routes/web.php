<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SoalController;
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

Route::get('/', [LandingController::class, 'index']);

Route::get('/pendaftaran', [LandingController::class, 'daftar']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');  
    Route::post('/logout', 'logout')->middleware('auth');
});
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/forgot-password', 'forgotPasswordForm')->middleware('guest')->name('password.request');
    Route::post('/forgot-password', 'prosesForgot')->middleware('guest')->name('password.email');
    Route::get('/reset-password/{token}', 'passwordReset')->middleware('guest')->name('password.reset');
    Route::post('/reset-password', 'newPassword')->middleware('guest')->name('password.update');

});

Route::controller(RegisterController::class)->group(function (){
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/register', 'create');
});

Route::controller(DashboardController::class)->middleware('auth')->group(function (){
    Route::get('/dashboard', 'index');
    Route::post('/dashboard/input-form-registrasi', 'create');
    Route::put('/dashboard/edit-form-registrasi', 'update');
    Route::get('/dashboard/lihat/{no_reg}', 'show')->name('admin.show')->middleware('admin');
    Route::patch('/dashboard/nonaktif', 'nonaktif');
    Route::get('/dashboard/pendaftar/export', 'export')->name('export.excel')->middleware('admin');
    Route::post('/admin/nilai/import', 'import')->middleware('admin');
    Route::post('/admin/fungsi-seleksi', 'seleksi')->middleware('admin');
});
Route::controller(SoalController::class)->group(function (){
    Route::post('/admin/soal/import', 'import')->middleware('admin');
    Route::get('/dashboard/soal/{no_reg}', 'show')->middleware('pendaftar')->middleware('soal')->middleware('revalidate');
    Route::post('/dashboard/soal', 'submit')->name('soal.submit')->middleware('pendaftar');
});
