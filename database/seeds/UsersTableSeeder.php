<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \DB::table('posts')->truncate();
        // \DB::table('users')->truncate();
        // \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        factory(App\Models\User::class,20)->create()->each(function($u){
            $u->posts()
                ->saveMany(factory(App\Models\Post::class,rand(1,5))->make())
                ->each(function($p){
                    $p->detail()->save(factory(App\Models\PropertyDetail::class)->make());

                    $ids = App\Models\Distance::pluck('id')->random(random_int(1,App\Models\Distance::count()));
                    $p->distances()->attach($ids,['meters'=> random_int(40,80)]);

                    $conveniences = App\Models\Convenience::pluck('id')->random(random_int(1,App\Models\Convenience::count()));
                    $p->conveniences()->attach($conveniences);
                });
        });
    }
}
