<?php

// use Faker\Generator as Faker;

$faker = Faker\Factory::create('vi_VN');
$factory->define(App\Models\Distance::class, function () use ($faker) {
    $name = ucwords($faker->unique()->word(3));
    return [
        'name'         => $name,
        'slug'         => str_slug($name),
        'created_at'   => now(),
        'updated_at'   => now()
    ];
});
