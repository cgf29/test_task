public function store(StoreMovieRequest $request, MovieService $service)
{
    $movie = $service->store($request->validated());
    return redirect()->back()->with('success', 'Movie created!');
}

public function publish(Movie $movie, MovieService $service)
{
    $service->publish($movie);
    return response()->json(['message' => 'Movie published']);
}
