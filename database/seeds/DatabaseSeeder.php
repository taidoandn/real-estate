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
            PostTypeTableSeeder::class,
            // CityTableSeeder::class,
            // DistrictTableSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            AdminTableSeeder::class,
            UserTableSeeder::class,
            ConvenienceTableSeeder::class,
            DistanceTableSeeder::class,
            FavoriteTableSeeder::class,
        ]);
    }
}
