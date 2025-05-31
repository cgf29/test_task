namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'genres' => 'sometimes|array',
            'genres.*' => 'exists:genres,id',
            'poster' => 'nullable|image|max:2048',
        ];
    }
}
