<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $create_post = new Permission();
        $create_post->name = "create-post";
        $create_post->type = "post";
        $create_post->save();

        $read_post = new Permission();
        $read_post->name = "read-post";
        $read_post->type = "post";
        $read_post->save();

        $update_post = new Permission();
        $update_post->name = "update-post";
        $update_post->type = "post";
        $update_post->save();

        $delete_post = new Permission();
        $delete_post->name = "delete-post";
        $delete_post->type = "post";
        $delete_post->save();

        $create_user = new Permission();
        $create_user->name = "create-user";
        $create_user->type = "user";
        $create_user->save();

        $read_user = new Permission();
        $read_user->name = "read-user";
        $read_user->type = "user";
        $read_user->save();

        $update_user = new Permission();
        $update_user->name = "update-user";
        $update_user->type = "user";
        $update_user->save();

        $delete_user = new Permission();
        $delete_user->name = "delete-user";
        $delete_user->type = "user";
        $delete_user->save();

    }
}
