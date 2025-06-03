<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|max:2048',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ];
    }
}