namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
            'poster' => 'nullable|image|max:2048',
        ];
    }
}
