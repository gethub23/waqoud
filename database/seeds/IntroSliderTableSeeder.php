<?php

use App\Models\IntroSlider;
use Illuminate\Database\Seeder;

class IntroSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IntroSlider::create([
            'image'       => '1.png' ,
            'title'       => ['ar' => 'عنوان البانر الاول', 'en' => 'First banner title ' ] ,
            'description' => ['ar' => ' وسف البانر الاول' , 'en' => 'first banner description' ] ,
        ]);
        IntroSlider::create([
            'image'       => '2.png' ,
            'title'       => ['ar' => 'عنوان البانر الثاني', 'en' => 'secound banner title ' ] ,
            'description' => ['ar' => ' وسف البانر الثاني' , 'en' => 'secound banner description' ] ,
        ]);
        IntroSlider::create([
            'image'       => '1.png' ,
            'title'       => ['ar' => 'عنوان البانر الثالث', 'en' => 'third banner title ' ] ,
            'description' => ['ar' => ' وسف البانر الثالث' , 'en' => 'third banner description' ] ,
        ]);
        IntroSlider::create([
            'image'       => '2.png' ,
            'title'       => ['ar' => 'عنوان البانر الرابع', 'en' => 'fourth banner title ' ] ,
            'description' => ['ar' => ' وسف البانر الرابع' , 'en' => 'fourth banner description' ] ,
        ]);
    }
}
