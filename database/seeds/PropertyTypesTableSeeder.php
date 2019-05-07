<?php

use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Models\PropertyType::class, 5)->create();
        $Villa = new PropertyType();
        $Villa->name = 'Biệt thự';
        $Villa->slug = str_slug('Biệt thự');
        $Villa->save();

        $apartment = new PropertyType();
        $apartment->name = 'Căn hộ';
        $apartment->slug = str_slug('Căn hộ');
        $apartment->save();

        $house = new PropertyType();
        $house->name = 'Nhà ở';
        $house->slug = str_slug('Nhà ở');
        $house->save();

        $Office = new PropertyType();
        $Office->name = 'Văn phòng';
        $Office->slug = str_slug('Văn phòng');
        $Office->save();

        $model = new PropertyType();
        $model->name = 'Nhà trọ';
        $model->slug = str_slug('Nhà trọ');
        $model->save();

    }
}
