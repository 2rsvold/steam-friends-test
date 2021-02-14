<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthSteamController;

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

Route::get('logout', [AuthSteamController::class, 'Logout'])->name('auth.logout');
Route::get('login', [AuthSteamController::class, 'Authenticate'])->name('auth.steam');
Route::get('/', [HomeController::class, 'Home']);
