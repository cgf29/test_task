namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }

    public function show($id)
    {
        return Genre::with(['movies' => function($query) {
            $query->with('genres');
        }])->findOrFail($id);
    }
}
