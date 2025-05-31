$factory->define(Genre::class, function () {
    return [
        'name' => fake()->word()
    ];
});
