<?php

use App\Models\Distance;
use Illuminate\Database\Seeder;

class DistancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Models\Distance::class, 5)->create()->each(function($distance){
        //     $ids = range(1,App\Models\Post::count());
        //     $distance->posts()->attach($ids,['meters'=> random_int(1,40)]);
        // });

        // Trạm xe buýt
        $bus =  new Distance();
        $bus->name = "Trạm xe buýt";
        $bus->slug = str_slug("Trạm xe buýt");
        $bus->save();

        // Ga xe lửa
        $train_station =  new Distance();
        $train_station->name = "Ga xe lửa";
        $train_station->slug = str_slug("Ga xe lửa");
        $train_station->save();

        // Trường học
        $school =  new Distance();
        $school->name = "Trường học";
        $school->slug = str_slug("Trường học");
        $school->save();

        // Sân bay
        $plane =  new Distance();
        $plane->name = "Sân bay";
        $plane->slug = str_slug("Sân bay");
        $plane->save();

        // Siêu thị
        $supermarket =  new Distance();
        $supermarket->name = "Siêu thị";
        $supermarket->slug = str_slug("Siêu thị");
        $supermarket->save();

        // Bãi biển
        $beach =  new Distance();
        $beach->name = "Bãi biển";
        $beach->slug = str_slug("Bãi biển");
        $beach->save();

        // Ngân hàng
        $bank =  new Distance();
        $bank->name = "Ngân hàng";
        $bank->slug = str_slug("Ngân hàng");
        $bank->save();
    }
}
