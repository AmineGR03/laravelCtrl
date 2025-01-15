<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/{id}', [FilmController::class, 'show'])->name('films.show');

// Auth routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');

// Reviews routes
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Route vers le tableau de bord de l'admin
  // Admin routes

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/films', [AdminController::class, 'filmsIndex'])->name('films.index');
    Route::get('/films/create', [AdminController::class, 'createFilm'])->name('films.create');
    Route::post('/films', [AdminController::class, 'storeFilm'])->name('films.store');
    Route::get('/films/{id}/edit', [AdminController::class, 'editFilm'])->name('films.edit');
    Route::put('/films/{id}', [AdminController::class, 'updateFilm'])->name('films.update');
    Route::delete('/films/{id}', [AdminController::class, 'deleteFilm'])->name('films.destroy');

    Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.destroy');

    Route::get('/reviews', [AdminController::class, 'reviewsIndex'])->name('reviews.index');

    Route::delete('/reviews/{id}', [AdminController::class, 'deleteReview'])->name('reviews.destroy');
});

