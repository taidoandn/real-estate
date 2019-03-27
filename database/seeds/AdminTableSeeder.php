<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
                'name' => 'King',
                'email' => 'admin@demo.com',
                'password' => bcrypt(123456),
                'phone' => '0987654321',
                'remember_token' => str_random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        factory(App\Models\Admin::class, 20)->create()->each(function($user){
            $boolean = random_int(0,1);
            if ($boolean) {
                $ids = App\Models\Role::all()->random(random_int(1,3));
                $user->roles()->attach($ids);
            }
        });
    }
}
