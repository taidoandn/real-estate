<?php

use Carbon\Carbon;

$faker = Faker\Factory::create('vi_VN');
$factory->define(App\Models\Post::class, function () use($faker){
    $purpose = $faker->randomElement(['sale','rent']);
    if($purpose == 'sale'){
        $sale = ['total_area' , 'm2'];
        $unit = $sale[array_rand($sale)];
    }else{
        $rent = ['month' , 'year'];
        $unit = $rent[array_rand($rent)];
    }
    return [
        'title'            => rtrim($faker->sentence(rand(4,7)) ,"."),
        'image'            => $faker->randomElement(['call-to-action.jpg','themeqx-cover.jpeg']),
        'area'             => $faker->randomNumber(2),
        'description'      => $faker->paragraphs(rand(3,7),true),
        'price'            => $faker->randomNumber(9),
        'unit'             => $unit,
        'purpose'          => $purpose,
        'address'          => $faker->address,
        'status'           => $faker->randomElement(['pending','published']),
        'negotiable'       => $faker->numberBetween(0,1),
        'latitude'         => $faker->latitude(9.6,21),
        'longitude'        => $faker->longitude(105.6,108.2),
        'property_type_id' => App\Models\PropertyType::pluck('id')->random(),
        'type_id'          => App\Models\PostType::pluck('id')->random(),
        'district_id'      => App\Models\District::pluck('id')->random(),
        'start_date'       => Carbon::now()->subDays(random_int(0,7)),
        'end_date'         => Carbon::now()->addDays(random_int(7,30)),
        'created_at'       => now(),
        'updated_at'       => now()
    ];
});
