<?php

use Illuminate\Database\Seeder;

class ConveniencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Convenience::class, 15)->create()->each(function($convenience){
            $ids = App\Models\Post::all()->random(random_int(1,App\Models\Post::count()));
            $convenience->posts()->attach($ids);
        });
    }
}
