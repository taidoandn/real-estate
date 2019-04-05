<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class,20)->create()->each(function($u){
            $u->posts()
                ->saveMany(factory(App\Models\Post::class,rand(1,5))->make())
                ->each(function($p){
                    $p->detail()->save(factory(App\Models\PropertyDetail::class)->make());
                });
        });
    }
}
