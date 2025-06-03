<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateMovieRequest;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Controllers\Controller;
use App\Services\MovieService;
use App\Models\Movie;

class MovieController extends Controller {
    public function __construct(protected MovieService $service) {}

    public function index() {
        return response()->json(Movie::with('genres')->paginate(10));
    }

    public function show($id) {
        return response()->json(Movie::with('genres')->findOrFail($id));
    }

    public function store(StoreMovieRequest $request) {
        $movie = $this->service->store($request->validated());
        return response()->json($movie->load('genres'));
    }

    public function update(UpdateMovieRequest $request, Movie $movie) {
        $movie = $this->service->update($movie, $request->validated());
        return response()->json($movie->load('genres'));
    }

    public function destroy(Movie $movie) {
        $movie->delete();
        return response()->json(['message' => 'Deleted']);
    }

    public function publish(Movie $movie) {
        $movie->update(['is_published' => true]);
        return response()->json(['message' => 'Published']);
        // не дуже зрозумів що малось на увазі під "публікацією" запису,
    }
}