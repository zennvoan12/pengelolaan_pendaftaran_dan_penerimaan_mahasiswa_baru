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

Route::get('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
