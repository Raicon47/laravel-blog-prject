<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\SearchController;

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
Route::get('/', [BlogController::class, 'home']);
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/show/{slug}', [BlogController::class, 'show']);
Route::get('/topics/{slug}', [TagController::class, 'show']);


Auth::routes();

Route::get('/forum', [ForumController::class, 'index'])->name('forum')->middleware('auth');
Route::post('/forum/store', [ForumController::class, 'store'])->middleware('auth');


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
