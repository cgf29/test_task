namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::with('genres')
            ->paginate(10);
    }

    public function show($id)
    {
        return Movie::with('genres')->findOrFail($id);
    }

    public function store(StoreMovieRequest $request, MovieService $service)
    {
        $movie = $service->create($request->validated(), $request->file('poster'));
        return response()->json($movie, 201);
    }

    public function update(UpdateMovieRequest $request, $id, MovieService $service)
    {
        $movie = $service->update($id, $request->validated(), $request->file('poster'));
        return response()->json($movie);
    }

    public function destroy($id)
    {
        Movie::destroy($id);
        return response()->json(['message' => 'Movie deleted']);
    }

    public function publish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->is_published = true;
        $movie->save();
        return response()->json(['message' => 'Movie published']);
    }
}
