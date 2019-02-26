<?php

use Illuminate\Database\Seeder;

class PropertyDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\PropertyDetail::class, 20)->create();
    }
}
