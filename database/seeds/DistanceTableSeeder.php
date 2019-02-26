<?php

use Illuminate\Database\Seeder;

class DistanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Distance::class, 5)->create()->each(function($distance){
            $ids = range(1,20);
            $distance->posts()->attach($ids,['meters'=> random_int(1,100)]);
        });
    }
}
