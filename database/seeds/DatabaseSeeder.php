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

        $this->call(PropertyTypeTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        // $this->call(PostTableSeeder::class);
        $this->call(PropertyDetailTableSeeder::class);
        $this->call(DistanceTableSeeder::class);
        $this->call(ConvenienceTableSeeder::class);

    }
}
