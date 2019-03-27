<?php

// use Faker\Generator as Faker;

$faker = Faker\Factory::create('vi_VN');
$factory->define(App\Models\Convenience::class, function () use ($faker) {
    $name = ucwords($faker->unique()->word());
    return [
        'name'         => $name,
        'type'         => $faker->randomElement(['interior', 'exterior']),
        'created_at'   => now(),
        'updated_at'   => now()
    ];
});
