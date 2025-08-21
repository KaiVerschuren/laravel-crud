<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [PageController::class, 'index']);

Route::get('/about', [PageController::class, 'about']);

Route::get('/product', [PageController::class, 'product'])->name('product');

Route::match(['get','post'], '/register', [PageController::class, 'register'])->name('register');
Route::match(['get','post'], '/login', [PageController::class, 'login'])->name('login');

Route::get('/logout', [PageController::class, 'logout'])->name('logout');


