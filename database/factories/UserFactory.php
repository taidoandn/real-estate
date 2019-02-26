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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'created_at' => now(),
        'updated_at' => now(),
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

$factory->define(App\Models\Post::class, function () use ($faker) {
    $purpose = $faker->randomElement(['sale','rent']);
    if($purpose == 'sale'){
        $sale = ['total_area' , 'm2'];
        $unit = $sale[array_rand($sale)];
    }else{
        $rent = ['month' , 'year'];
        $unit = $rent[array_rand($rent)];
    }
    return [
        'title'       => $faker->sentence(),
        'image'       => $faker->randomElement(['call-to-action.jpg','themeqx-cover.jpeg']),
        'area'        => $faker->randomNumber(2),
        'description' => $faker->paragraph(),
        'price'       => $faker->randomNumber(9),
        'unit'        => $unit,
        'purpose'     => $purpose,
        'address'     => $faker->address,
        'status'      => $faker->randomElement(['pending','published','blocked']),
        'negotiable'  => $faker->numberBetween(0,1),
        'latitude'    => $faker->latitude(9.6,21),
        'longitude'   => $faker->longitude(105.6,108.2),
        'type_id'     => App\Models\PropertyType::inRandomOrder()->first()->getKey(),
        'district_id' => App\Models\District::inRandomOrder()->first()->getKey(),
        'user_id'     => App\Models\User::inRandomOrder()->first()->getKey(),
        'created_at'  => now(),
        'updated_at'  => now()
    ];
});

$factory->define(App\Models\PropertyDetail::class, function () use ($faker) {
    return [
        'floor'        => $faker->randomNumber(1),
        'bath'         => $faker->randomNumber(1),
        'balcony'      => $faker->randomNumber(1),
        'toilet'       => $faker->randomNumber(1),
        'bed_room'     => $faker->randomNumber(1),
        'dinning_room' => $faker->randomElement([0,1]),
        'living_room'  => $faker->randomElement([0,1]),
        'post_id'      => factory('App\Models\Post')->create()->id,
        'created_at'   => now(),
        'updated_at'   => now()
    ];
});

$factory->define(App\Models\Distance::class, function () use ($faker) {
    $name = ucwords($faker->unique()->word(3));
    return [
        'name'         => $name,
        'slug'         => str_slug($name),
        'created_at'   => now(),
        'updated_at'   => now()
    ];
});
$factory->define(App\Models\Convenience::class, function () use ($faker) {
    $name = ucwords($faker->unique()->word());
    return [
        'name'         => $name,
        'type'         => $faker->randomElement(['interior', 'exterior']),
        'created_at'   => now(),
        'updated_at'   => now()
    ];
});

