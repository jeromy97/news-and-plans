<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

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

// authentication routes
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// news routes
Route::get('/', [NewsController::class, 'list'])->middleware('auth');
Route::get('/news', [NewsController::class, 'list'])->name('news')->middleware('auth');
Route::get('/news/add', [NewsController::class, 'add'])->name('newsAdd')->middleware('auth');
Route::post('/news/create', [NewsController::class, 'create'])->name('newsCreate')->middleware('auth');
Route::get('/news/{news}', [NewsController::class, 'detail'])->middleware('auth');
Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->middleware('auth');
Route::post('/news/update', [NewsController::class, 'update'])->middleware('auth');