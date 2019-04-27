<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Blog::class, function (Faker $faker) {
    $title = rtrim($faker->sentence(rand(3,5)) ,".");
    return [
        'title'   => $title,
        'slug'    => str_slug($title),
        'content' => $faker->paragraphs(rand(3,7),true),
        'author'  => $faker->name(),
    ];
});
