<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => 'sometimes|string|max:255',
            'poster' => 'nullable|image|max:2048',
            'genres' => 'sometimes|array',
            'genres.*' => 'exists:genres,id',
        ];
    }
}