<?php

use App\Models\IntroHowWork;
use Illuminate\Database\Seeder;

class IntroHowWorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IntroHowWork::create([
            'title' => ['ar' => 'حمل التطبيق' , 'en'  => 'uploade app'] ,
            'image' => '11.png' , 
        ]);
        IntroHowWork::create([
            'title' => ['ar' => 'تسجيل مستخدم جديد' , 'en'  => 'Register New User'] ,
            'image' => '22.png' , 
        ]);
        IntroHowWork::create([
            'title' => ['ar' => 'أدخل رمز التحقق لتفعيل الحساب' , 'en'  => 'Send Activation Code To activate account'] ,
            'image' => '33.png' , 
        ]);
        IntroHowWork::create([
            'title' => ['ar' => 'حدد مكان إقامتك على الخريطة' , 'en'  => 'Locate Your location'] ,
            'image' => '44.png' , 
        ]);
    }
}
