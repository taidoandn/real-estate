<?php
use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $purpose = $faker->randomElement(['sale','rent']);
    if($purpose == 'sale'){
        $sale = ['total_area' , 'm2'];
        $unit = $sale[array_rand($sale)];
    }else{
        $rent = ['month' , 'year'];
        $unit = $rent[array_rand($rent)];
    }
    return [
        'title'       => rtrim($faker->sentence(rand(5,10)) ,"."),
        'image'       => $faker->randomElement(['call-to-action.jpg','themeqx-cover.jpeg']),
        'area'        => $faker->randomNumber(2),
        'description' => $faker->paragraphs(rand(3,7),true),
        'price'       => $faker->randomNumber(9),
        'unit'        => $unit,
        'purpose'     => $purpose,
        'address'     => $faker->address,
        'status'      => $faker->randomElement(['pending','published']),
        'negotiable'  => $faker->numberBetween(0,1),
        'latitude'    => $faker->latitude(9.6,21),
        'longitude'   => $faker->longitude(105.6,108.2),
        'type_id'     => App\Models\PropertyType::pluck('id')->random(),
        'district_id' => App\Models\District::pluck('id')->random(),
        'created_at'  => now(),
        'updated_at'  => now()
    ];
});

