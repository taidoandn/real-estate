<?php

// use Faker\Generator as Faker;

$faker = Faker\Factory::create('vi_VN');
$factory->define(App\Models\PropertyDetail::class, function () use ($faker) {
    return [
        'floor'        => random_int(1,10),
        'bath'         => random_int(1,10),
        'balcony'      => random_int(1,10),
        'toilet'       => random_int(1,10),
        'bed_room'     => random_int(1,10),
        'dinning_room' => $faker->randomElement([0,1]),
        'living_room'  => $faker->randomElement([0,1]),
        'created_at'   => now(),
        'updated_at'   => now()
    ];
});
