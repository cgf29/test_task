<?php

use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\GenreController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'genres'], function () {
    Route::get('/', [GenreController::class, 'index'])->name('genres');        // GET /genres
    Route::get('{id}', [GenreController::class, 'show'])->name('genres.show');       // GET /genres/{id}
});

Route::group(['prefix' => 'movies'], function () {
    Route::get('/', [MovieController::class, 'index'])->name('movies');        // GET /movies
    Route::get('{id}', [MovieController::class, 'show'])->name('movies.show');       // GET /movies/{id}
    Route::post('/', [MovieController::class, 'store'])->name('movies.store');       // POST /movies
    Route::put('{movie}', [MovieController::class, 'update'])->name('movies.update');// PUT /movies/{movie}
    Route::delete('{movie}', [MovieController::class, 'destroy'])->name('movies.destroy'); // DELETE /movies/{movie}
    Route::post('{movie}/publish', [MovieController::class, 'publish'])->name('movies.publish'); // POST /movies/{movie}/publish
});
