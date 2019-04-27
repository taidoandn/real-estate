<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        for ($i=1; $i <= 5 ; $i++) {
            DB::table('cities')->insert(
                [
                    'name'       => $faker->unique()->city,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
