<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        Movie::factory()
            ->count(10)
            ->create()
            ->each(function ($movie) {
                $genres = Genre::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $movie->genres()->attach($genres);
            });
    }
}