<?php

use App\Models\Fuel;
use Illuminate\Database\Seeder;

class FuelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fuel::create([
            'name' => ['ar' => 'سولار', 'en' => 'Solar'] , 
            'price' => 4 , 
        ]);
        Fuel::create([
            'name' => ['ar' => 'جاز', 'en' => 'Gas'] , 
            'price' => 5 , 
        ]);
        Fuel::create([
            'name' => ['ar' => 'بنزين', 'en' => 'petrol'] , 
            'price' => 6 , 
        ]);
    }
}
