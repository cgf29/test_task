$factory->define(Movie::class, function () {
    return [
        'title' => fake()->sentence(3),
        'is_published' => fake()->boolean(),
        'poster' => null,
    ];
});