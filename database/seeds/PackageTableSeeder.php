<?php

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'price'        => 200 , 
            'title'        => ['ar' => 'باقه عادية'  , 'en' =>  'Normal Package'] , 
            'description'  => ['ar' => 'وصف باقه عادية وصف باقه عاديةوصف باقه عادية'  , 'en' =>  'Normal Package description Normal Package description Normal Package description Normal Package description Normal Package description '] , 
        ]);
        Package::create([
            'price'        => 300 , 
            'title'        => ['ar' => 'باقه مميزة'  , 'en' =>  'Special Package'] , 
            'description'   => ['ar' => 'وصف باقه مميزة وصف باقه مميزة باقه مميزة'  , 'en' =>  'Special Package description Special Package description Special Package description Special Package description Special Package description '] , 
        ]);
        Package::create([
            'price'        => 400 , 
            'title'        => ['ar' => 'باقه فضية'  , 'en' =>  'Silver Package'] , 
            'description'   => ['ar' => 'وصف باقه فضية وصف باقه فضية باقه فضية'  , 'en' =>  'Silver Package description Silver Package description Silver Package description Silver Package description Silver Package description '] , 
        ]);
        Package::create([
            'price'        => 1000 , 
            'title'        => ['ar' => 'باقه ذهبية'  , 'en' =>  'Golden Package'] , 
            'description'   => ['ar' => 'وصف باقه ذهبية وصف باقه ذهبية باقه ذهبية'  , 'en' =>  'Golden Package description Golden Package description Golden Package description Golden Package description Golden Package description '] , 
        ]);
    }
}
