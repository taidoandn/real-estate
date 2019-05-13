<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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

        $manager = new Role();
        $manager->name = "Manager";
        $manager->save();

        foreach (App\Models\Role::all() as $role) {
            $ids = \App\Models\Permission::pluck('id')->random(random_int(1,App\Models\Role::count()));
            $role->permissions()->attach($ids);
        }
    }
}
