<?php

// use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$faker = Faker\Factory::create('vi_VN');
$factory->define(App\Models\User::class, function () use ($faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'phone'             => $faker->phoneNumber,
        'address'           => $faker->address,
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',   // secret
        'remember_token'    => str_random(10),
        'created_at'        => now(),
        'updated_at'        => now(),
    ];
});

$factory->define(App\Models\PropertyType::class, function () use ($faker) {
    $name = ucwords($faker->unique()->word(2,true));
    return [
        'name'       => $name,
        'slug'       => str_slug($name),
        'created_at' => now(),
        'updated_at' => now()
    ];
});

