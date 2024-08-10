<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::prefix('movies')->group(function () {
  Route::get('/{movie}', [MovieController::class, 'show'])->name('movies.show');
  Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
  Route::get('/edit/{movie}', [MovieController::class, 'edit'])->name('movies.edit');


  // Rutas de Métodos de Formulario
  Route::post('/store', [MovieController::class, 'store'])->name('movies.store');
  Route::put('/update/{movie}', [MovieController::class, 'update'])->name('movies.update');
  Route::delete('/destroy/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});


Route::prefix('category')->group(function () {
  Route::get('/{category}', [MovieController::class, 'viewByCategory'])->name('categories.index');
});

Route::prefix('studio')->group(function () {
  Route::get('/{studio}', [MovieController::class, 'viewByStudio'])->name('movies.studio');
});

// Rutas de Autenticación
Route::get('/register', [RegisterUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionController::class, 'destroy'])->name('logout');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
//fin de rutas de autenticación