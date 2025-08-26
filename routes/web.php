<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
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

Route::get('/product/{id?}', [ProductController::class, 'index'])
    ->where('id', '[0-9]+')
    ->name('product.index');
Route::get('/product/category', [ProductController::class, 'category'])->name('product.category');

Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');
Route::post('/product/add', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/addjunction', [ProductController::class, 'addjunction'])->name('product.addjunction');
Route::post('/product/addjunction', [ProductController::class, 'storejunction'])->name('product.storejunction');

Route::match(['get','post'], '/register', [PageController::class, 'register'])->name('register');
Route::match(['get','post'], '/login', [PageController::class, 'login'])->name('login');

Route::get('/logout', [PageController::class, 'logout'])->name('logout');


