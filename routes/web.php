use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\MovieController;

Route::prefix('genres')->group(function () {
    Route::get('/', [GenreController::class, 'index']);
    Route::get('{id}', [GenreController::class, 'show']);
});

Route::prefix('movies')->group(function () {
    Route::get('/', [MovieController::class, 'index']);
    Route::get('{id}', [MovieController::class, 'show']);
    Route::post('/', [MovieController::class, 'store']);
    Route::put('{id}', [MovieController::class, 'update']);
    Route::delete('{id}', [MovieController::class, 'destroy']);
    Route::post('{id}/publish', [MovieController::class, 'publish']);
});
