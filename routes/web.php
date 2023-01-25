<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlansController;
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
Route::get('/', [NewsController::class, 'list'])->name('home')->middleware('auth');
Route::get('/news', [NewsController::class, 'list'])->name('news')->middleware('auth');
Route::get('/news/add', [NewsController::class, 'add'])->name('newsAdd')->middleware('auth');
Route::post('/news/create', [NewsController::class, 'create'])->name('newsCreate')->middleware('auth');
Route::get('/news/{news}', [NewsController::class, 'detail'])->middleware('auth');
Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->middleware('auth');
Route::post('/news/update', [NewsController::class, 'update'])->middleware('auth');

// plans routes
Route::get('/plans', [PlansController::class, 'list'])->name('plans')->middleware('auth');
Route::get('/plans/add', [PlansController::class, 'add'])->name('plansAdd')->middleware('auth');
Route::post('/plans/create', [PlansController::class, 'create'])->name('plansCreate')->middleware('auth');
Route::get('/plans/{plan}', [PlansController::class, 'detail'])->middleware('auth');
Route::get('/plans/{plan}/edit', [PlansController::class, 'edit'])->middleware('auth');
Route::post('/plans/update', [PlansController::class, 'update'])->middleware('auth');
Route::get('/plans/{plan}/publish', [PlansController::class, 'publishEdit'])->middleware('auth');
Route::post('/plans/publish', [PlansController::class, 'publish'])->middleware('auth');