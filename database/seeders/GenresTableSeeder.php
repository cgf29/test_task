public function run()
{
    Genre::factory()->count(5)->create();
}
