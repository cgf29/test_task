namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieService
{
    public function create(array $data, $poster = null): Movie
    {
        $path = $poster 
            ? $poster->store('posters', 'public') 
            : 'posters/default.jpg';

        $movie = Movie::create([
            'title' => $data['title'],
            'poster_path' => $path,
            'is_published' => false,
        ]);

        $movie->genres()->sync($data['genres']);

        return $movie->load('genres');
    }

    public function update($id, array $data, $poster = null): Movie
    {
        $movie = Movie::findOrFail($id);

        if (isset($data['title'])) {
            $movie->title = $data['title'];
        }

        if ($poster) {
            $path = $poster->store('posters', 'public');
            $movie->poster_path = $path;
        }

        $movie->save();

        if (isset($data['genres'])) {
            $movie->genres()->sync($data['genres']);
        }

        return $movie->load('genres');
    }
}
