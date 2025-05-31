public function run()
{
    Movie::factory()
        ->count(10)
        ->create()
        ->each(function ($movie) {
            $movie->genres()->attach(Genre::inRandomOrder()->take(2)->pluck('id'));
        });
}