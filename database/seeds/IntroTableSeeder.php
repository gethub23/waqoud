<?php

use App\Models\Intro;
use Illuminate\Database\Seeder;

class IntroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Intro::create([
            'image'       => 'default.png' , 
            'title'       => ['ar' => 'الصفحة الاولي' , 'en' => 'first page'] , 
            'description' => ['ar' => 'وصف الصفحه الاولي وصف الصفحه الاولي وصف الصفحه الاولي وصف الصفحه الاولي ' , 'en' => 'first page description  page description  page description  page description  page description  page description '] , 
        ]);
        Intro::create([
            'image'       => 'default.png' , 
            'title'       => ['ar' => 'الصفحة الثانية' , 'en' => 'scound page'] , 
            'description' => ['ar' => 'وصف الصفحه الثانية وصف الصفحه الثانية وصف الصفحه الثانية وصف الصفحه الثانية ' , 'en' => 'scound page description  page description  page description  page description  page description  page description '] , 
        ]);
        Intro::create([
            'image'       => 'default.png' , 
            'title'       => ['ar' => 'الصفحة الثالثة' , 'en' => 'third page'] , 
            'description' => ['ar' => 'وصف الصفحه الثالثة وصف الصفحه الثالثة وصف الصفحه الثالثة وصف الصفحه الثالثة ' , 'en' => 'third page description  page description  page description  page description  page description  page description '] , 
        ]);
    }
}
