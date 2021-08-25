<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'مصر' , 
            'key'  => '+20'   , 
        ]);
        Country::create([
            'name' => 'السعودية' , 
            'key'  => '+966'   , 
        ]);
        Country::create([
            'name' => 'الامارات' , 
            'key'  => '+971'   , 
        ]);
        Country::create([
            'name' => 'البحرين' , 
            'key'  => '+973'   , 
        ]);
        Country::create([
            'name' => 'قطر' , 
            'key'  => '+974'   , 
        ]);
        Country::create([
            'name' => 'ليبيا' , 
            'key'  => '+218'   , 
        ]);
        Country::create([
            'name' => 'الكويت' , 
            'key'  => '+965'   , 
        ]);
        Country::create([
            'name' => 'عمان' , 
            'key'  => '‎+968'   , 
        ]);
    }
}
