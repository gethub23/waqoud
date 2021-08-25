<?php

use App\Models\IntroPartener;
use Illuminate\Database\Seeder;

class IntroPartenerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IntroPartener::create([
            'image'  => '1.png' , 
        ]);
       
        IntroPartener::create([
            'image'  => '3.png' , 
        ]);
        IntroPartener::create([
            'image'  => '4.png' , 
        ]);
    }
}
