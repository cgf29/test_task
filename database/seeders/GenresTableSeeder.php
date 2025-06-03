<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\Genre;

class GenresTableSeeder extends Seeder
{
    public function run()
    {
        Genre::factory()->count(5)->create();
    }
}
