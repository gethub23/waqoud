<?php

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'image' => '1.png'
        ]);
        Image::create([
            'image' => '2.png'
        ]);
        Image::create([
            'image' => '3.png'
        ]);
        Image::create([
            'image' => '4.png'
        ]);
        Image::create([
            'image' => '5.png'
        ]);
    }
}
