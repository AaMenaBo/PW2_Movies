<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\StudioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::prefix('movies')->group(function () { //Se puede agregar el auth despues 
    //Rutas de vistas
    Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
    Route::get('/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');

    //Rutas de Metodos
    Route::post('/store', [MovieController::class, 'store'])->name('movies.store');
    Route::put('/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});

Route::prefix('category')->group(function () {
    Route::get('/{category}', [MovieController::class, 'viewByCategory'])->name('movies.genre');
});
Route::prefix('studio')->group(function () {
    Route::get('/{studio}', [MovieController::class, 'viewBystudio'])->name('movies.studio');
});
