<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PropertyTypeTableSeeder::class,
            CityTableSeeder::class,
            DistrictTableSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            AdminTableSeeder::class,
            DistanceTableSeeder::class,
            ConvenienceTableSeeder::class,
        ]);


    }
}
