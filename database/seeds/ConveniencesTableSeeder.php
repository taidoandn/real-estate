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

        //võng
        $hammock = new Convenience();
        $hammock->name = "Võng";
        $hammock->type = "interior";
        $hammock->save();

        $fridge = new Convenience();
        $fridge->name = "Tủ lạnh";
        $fridge->type = "interior";
        $fridge->save();

        $pool = new Convenience();
        $pool->name = "Bể bơi";
        $pool->type = "exterior";
        $pool->save();
    }
}
