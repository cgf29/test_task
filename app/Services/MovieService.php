<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Models\Movie;

class MovieService {
    public function store(array $data): Movie {
        $posterPath = isset($data['poster'])
            ? $data['poster']->store('posters', 'public')
            : 'default.jpg';

        $movie = Movie::create([
            'title' => $data['title'],
            'poster' => $posterPath,
        ]);

        $movie->genres()->sync($data['genres']);

        return $movie;
    }

    public function update(Movie $movie, array $data): Movie {
        if (isset($data['poster'])) {
            if ($movie->poster && $movie->poster !== 'default.jpg') {
                Storage::disk('public')->delete($movie->poster);
            }
            $data['poster'] = $data['poster']->store('posters', 'public');
        }

        $movie->update($data);
        if (isset($data['genres'])) {
            $movie->genres()->sync($data['genres']);
        }

        return $movie;
    }
}