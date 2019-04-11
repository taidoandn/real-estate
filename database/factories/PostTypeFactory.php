<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Models\PostType::class, function (Faker $faker) {
    $name  = ucwords($faker->unique()->word(3));
    return [
        'name'        => $name,
        'slug'        => str_slug($name),
        'price'       => $faker->randomNumber(6),
        'description' => $faker->sentence(3),
        'created_at'  => now(),
        'updated_at'  => now()
    ];
});
