<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\TestMiddleware;


Route::get('/', function () {
    return redirect('/admin/dashboard');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


Route::get('/admin/movies', [MovieController::class, 'index'])
    ->middleware(TestMiddleware::class)
    ->name('admin.movies.index');

Route::get('/admin/movies/create', [MovieController::class, 'create'])
    ->middleware(TestMiddleware::class)
    ->name('admin.movies.create');

Route::post('/admin/movies', [MovieController::class, 'store'])
    ->middleware(TestMiddleware::class)
    ->name('admin.movies.store');

Route::get('/admin/movies/{movieId}', [MovieController::class, 'edit'])
    ->middleware(TestMiddleware::class)
    ->name('admin.movies.edit');

Route::put('/admin/movies/{movieId}', [MovieController::class, 'update'])
    ->middleware(TestMiddleware::class)
    ->name('admin.movies.update');

Route::delete('/admin/movies/{movieId}', [MovieController::class, 'delete'])
    ->middleware(TestMiddleware::class)
    ->name('admin.movies.delete');

    // user CRUD
     Route::resource('users', UserController::class)->except(['show']);

    //  genre CRUD
    Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
    Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');
});


