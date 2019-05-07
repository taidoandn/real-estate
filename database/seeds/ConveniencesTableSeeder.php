<?php

use Illuminate\Database\Seeder;
use App\Models\Convenience;

class ConveniencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Air condition
        $air_condition = new Convenience();
        $air_condition->name = "Điều hòa";
        $air_condition->type = "interior";
        $air_condition->save();

        // Cable TV
        $tv = new Convenience();
        $tv->name = "TV";
        $tv->type = "interior";
        $tv->save();

        // Lift
        $lift = new Convenience();
        $lift->name = "Tạ";
        $lift->type = "interior";
        $lift->save();

        //sofa
        $sofa = new Convenience();
        $sofa->name = "Ghế Sofa";
        $sofa->type = "interior";
        $sofa->save();

        //garden
        $garden = new Convenience();
        $garden->name = "Vườn hoa";
        $garden->type = "exterior";
        $garden->save();

        //garden
        $garden = new Convenience();
        $garden->name = "Vườn hoa";
        $garden->type = "exterior";
        $garden->save();

        //Generator
        $generator = new Convenience();
        $generator->name = "Máy phát điện";
        $generator->type = "exterior";
        $generator->save();

        //internet
        $generator = new Convenience();
        $generator->name = "Internet/wifi";
        $generator->type = "exterior";
        $generator->save();
        foreach (Convenience::all() as $convenience) {
            $ids = App\Models\Post::all()->random(random_int(1,App\Models\Post::count()));
            $convenience->posts()->attach($ids);
        }
    }
}
