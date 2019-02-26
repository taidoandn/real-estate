<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        for ($i=1; $i <= 50 ; $i++) {
            DB::table('districts')->insert(
                [
                    'name'       => $faker->unique()->province,
                    'city_id'    => $faker->numberBetween(1,5),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
