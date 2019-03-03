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
        DB::table('users')->insert(
            [
                'name' => 'King',
                'email' => 'admin@demo.com',
                'email_verified_at' => now(),
                'password' => bcrypt(12345),
                'address' => 'Đà Nẵng, Việt Nam',
                'phone' => '0987654321',
                'remember_token' => str_random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        factory(App\Models\User::class,50)->create();
        factory(App\Models\Admin::class, 20)->create()->each(function($user){
            $boolean = random_int(0,1);
            if ($boolean) {
                $ids = App\Models\Role::all()->random(random_int(1,3));
                $user->roles()->attach($ids);
            }
        });
    }
}
