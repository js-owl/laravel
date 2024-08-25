<?php

use App\Http\Controllers\Account;
use App\Http\Controllers\Auth\Sessions;
use App\Http\Controllers\Brands;
use App\Http\Controllers\Cars;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Public\Cars as PublicCars;
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

Route::prefix('/auth')->middleware('guest')->group(function(){
    Route::controller(Sessions::class)->group(function(){
        Route::get('/login', 'create')->name('auth.sessions.create');
        Route::post('/login', 'store')->name('auth.sessions.store');
    });
});

Route::middleware('auth')->get('/secret', function(){
    return 'secret page';
});

Route::middleware('auth', 'verified')->prefix('/admin')->group(function(){
    Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    Route::get('/posts', [Posts::class, 'index']);
    Route::get('/posts/create', [Posts::class, 'create']);
    Route::get('/posts/{id}', [Posts::class, 'show'])->name('posts.show');
    Route::post('/posts', [Posts::class, 'store']);
    Route::get('/posts/{id}/edit', [Posts::class, 'edit']);
    Route::put('/posts/{id}', [Posts::class, 'update'])->name('posts.update');

    // Route::resource('cars', Cars::class);
    Route::middleware('can:cars')->group(function(){
        Route::get('/cars/trashed', [Cars::class, 'trashed'])->name('cars.trashed');
        Route::put('/cars/{car}/restore', [Cars::class, 'restore'])->name('cars.restore');
        Route::resource('cars', Cars::class);
    }); 

    Route::resource('brands', Brands::class);
    Route::get('/account', [ Account::class, 'index' ])->name('account.index');
    Route::delete('/logout', [ Sessions::class, 'destroy' ])->name('auth.sessions.destroy');
});

Route::get('/', [PublicCars::class, 'index'])->name('home');
Route::get('/catalog/{car}', [PublicCars::class, 'show'])->name('catalog.show');

Route::post('/comments', [ Comments::class, 'store' ])->name('comments.store');;