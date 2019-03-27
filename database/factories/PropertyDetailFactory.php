<?php

// use Faker\Generator as Faker;

$faker = Faker\Factory::create('vi_VN');
$factory->define(App\Models\PropertyDetail::class, function () use ($faker) {
    return [
        'floor'        => random_int(1,10),
        'bath'         => $faker->randomNumber(1),
        'balcony'      => $faker->randomNumber(1),
        'toilet'       => $faker->randomNumber(1),
        'bed_room'     => $faker->randomNumber(1),
        'dinning_room' => $faker->randomElement([0,1]),
        'living_room'  => $faker->randomElement([0,1]),
        'created_at'   => now(),
        'updated_at'   => now()
    ];
});
