<?php

use Illuminate\Database\Seeder;

class DistancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Distance::class, 5)->create()->each(function($distance){
            $ids = range(1,App\Models\Post::count());
            $distance->posts()->attach($ids,['meters'=> random_int(1,40)]);
        });
    }
}
