<?php

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social::create([
            'icon'              => 'facebook.png',
            'name'              => 'facebook',
            'link'              => 'https://www.facebook.com',
        ]);
        Social::create([
            'name'              => 'instgram',
            'icon'              => 'Instagram.png',
            'link'              => 'https://www.instgram.com',
        ]);
    }
}
