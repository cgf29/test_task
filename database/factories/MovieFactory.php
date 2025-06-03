<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;

class MovieFactory extends Factory {
    protected $model = Movie::class;

    public function definition(): array {
        return [
            'title' => $this->faker->sentence,
            'poster' => 'default.jpg',
            'is_published' => false,
        ];
    }
}