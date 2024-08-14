<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;


Route::resource('movies', MovieController::class);
Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');

// Rutas de Métodos de Formulario
Route::post('/movies/store', [MovieController::class, 'store'])->name('movies.store');
Route::put('/movies/update/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/destroy/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

Route::get('/categories', [MovieController::class, 'categories'])->name('categories.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/category/{category}', [MovieController::class, 'viewByCategory'])->name('categories.list');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::post('/category/store', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/studio/{studio}', [MovieController::class, 'viewByStudio'])->name('movies.studio');

// Rutas de Autenticación
Route::get('/register', [RegisterUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionController::class, 'destroy'])->name('logout');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
//fin de rutas de autenticación
