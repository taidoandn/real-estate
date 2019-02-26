<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $admin = new Role();
        $admin->name = "Admin";
        $admin->save();

        $editor = new Role();
        $editor->name = "Editor";
        $editor->save();

        $writer = new Role();
        $writer->name = "Writer";
        $writer->save();

        foreach (App\Models\Role::all() as $role) {
            $ids = \App\Models\Permission::pluck('id')->random(random_int(1,8));
            $role->permissions()->attach($ids);
        }
    }
}
