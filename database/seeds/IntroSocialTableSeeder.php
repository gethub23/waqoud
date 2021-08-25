<?php

use App\Models\IntroSocial;
use Illuminate\Database\Seeder;

class IntroSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IntroSocial::create([
            'key'  => 'facebook' ,   
            'icon' => 'fab fa-facebook-f' ,   
            'url'  => 'https://facebook.com' ,   
        ]);
        IntroSocial::create([
            'key'  => 'twitter' ,   
            'icon' => 'fab fa-twitter' ,   
            'url'  => 'https://twitter.com' ,   
        ]);
        IntroSocial::create([
            'key'  => 'instagram' ,   
            'icon' => 'fab fa-instagram' ,   
            'url'  => 'https://instagram.com' ,   
        ]);
        IntroSocial::create([
            'key'  => 'googleplus' ,   
            'icon' => 'fab fa-google-plus-g' ,   
            'url'  => 'https://google.com' ,   
        ]);
    }
}
