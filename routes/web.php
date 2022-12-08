<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;

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
});
