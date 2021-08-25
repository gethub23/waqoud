<?php

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 
        City::create(
            ['name' => [ 'ar' => 'الرياض'    , 'en' => 'El-ryad']]
        );
        // 2 
        City::create(
            ['name' => ['ar' => 'المدينة'    , 'en' => 'Elmadina']] ,
        );
        // 3
        City::create(
            ['name' => ['ar' => 'الدمام'    , 'en' => 'Eldamam']] ,
        );
        // 4 
        City::create(
            ['name' => ['ar' => 'القصيم'    , 'en' => 'Elqasem']]
        );
        // 5 
        City::create(
            ['name' => ['ar' => 'جدة'       , 'en' => 'Gadda']] 
        );
        // 6
        City::create(
            ['name' => ['ar' => 'مكة'       , 'en' => 'Makka']]
        );
        // 7
        City::create(
            ['name' => ['ar' => 'المنفوحة'  , 'en' => 'El-manfouha']]
        );
        //8
        City::create(
            ['name' => ['ar' => 'الخبر'     , 'en' => 'El-Khober']]
        );
        //9
        City::create(
            ['name' => ['ar' => 'الفيحاء'   , 'en' => 'El-Fayhaa']] 
        );
    }
}
