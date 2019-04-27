<?php

use Illuminate\Database\Seeder;
use App\Models\PostType;

class PostTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $normal              = new PostType();
        $normal->name        = "Tin thường";
        $normal->description = "Là loại tin đăng bằng chữ màu đen, khung màu trắng, không băng rôn";
        $normal->price       = 5000;
        $normal->save();

        $premium              = new PostType();
        $premium->name        = "Tin cao cấp";
        $premium->description = "Là loại tin đăng bằng chữ màu xanh, khung màu trắng, có 1 băng rôn";
        $premium->price       = 20000;
        $premium->save();

        $vip              = new PostType();
        $vip->name        = "Tin Vip";
        $vip->description = "Là loại tin đăng bằng chữ màu đỏ, khung màu vàng, có 2 băng rôn";
        $vip->price       = 50000;
        $vip->save();

    }
}
