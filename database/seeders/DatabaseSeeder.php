public function run()
{
    $this->call([
        GenreSeeder::class,
        MovieSeeder::class,
    ]);
}
