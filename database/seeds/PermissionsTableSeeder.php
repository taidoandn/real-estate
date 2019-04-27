<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
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

        $create_account = new Permission();
        $create_account->name = "create-account";
        $create_account->type = "account";
        $create_account->save();

        $read_account = new Permission();
        $read_account->name = "read-account";
        $read_account->type = "account";
        $read_account->save();

        $update_account = new Permission();
        $update_account->name = "update-account";
        $update_account->type = "account";
        $update_account->save();

        $delete_account = new Permission();
        $delete_account->name = "delete-account";
        $delete_account->type = "account";
        $delete_account->save();

    }
}
