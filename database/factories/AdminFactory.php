<?php

// use Faker\Generator as Faker;

$faker = Faker\Factory::create('vi_VN');
$factory->define(App\Models\Admin::class, function () use ($faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'phone'          => $faker->phoneNumber,
        'address'        => $faker->address,
        'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',   // secret
        'remember_token' => str_random(10),
        'created_at'     => now(),
        'updated_at'     => now(),
    ];
});
