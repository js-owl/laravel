<?php

use App\Http\Controllers\Cars;
use App\Http\Controllers\Posts;
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

Route::get('/posts', [Posts::class, 'index']);
Route::get('/posts/create', [Posts::class, 'create']);
Route::get('/posts/{id}', [Posts::class, 'show'])->name('posts.show');
Route::post('/posts', [Posts::class, 'store']);
Route::get('/posts/{id}/edit', [Posts::class, 'edit']);
Route::put('/posts/{id}', [Posts::class, 'update'])->name('posts.update');

// Route::resource('cars', Cars::class);
Route::get('/cars/trashed', [Cars::class, 'trashed'])->name('cars.trashed');
Route::put('/cars/{car}/restore', [Cars::class, 'restore'])->name('cars.restore');
Route::resource('cars', Cars::class);