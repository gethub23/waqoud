<?php

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Station::create([
            'avatar'        => 'default.png' , 
            'boss_avatar'   => 'default.png' , 
            'name'          => 'محطة وقود الرياض' , 
            'phone'         => '0501234567' , 
            'email'         => 'elryad@gmail.com' , 
            'password'      => '123456' , 
            'city_id'       => 1 , 
            'active'        => 1 , 
            'block'         => 0 , 
            'boss_name'     => 'مدير فرع الرياض' , 
            'boss_phone'    => '0501234567' , 
            'boss_identity' => '211SMKMK09KMK' , 
            'latitude'      => 24.7241504 , 
            'longitude'     => 47.3830068 , 
        ]);
        //2 
        Station::create([
            'avatar'        => 'default.png' , 
            'boss_avatar'   => 'default.png' , 
            'name'          => 'محطة وقود المدينة' , 
            'phone'         => '0502234567' , 
            'email'         => 'elmadina@gmail.com' , 
            'password'      => '123456' , 
            'city_id'       => 2 , 
            'active'        => 1 , 
            'block'         => 0 , 
            'boss_name'     => 'مدير فرع المدينة' , 
            'boss_phone'    => '0502234567' , 
            'boss_identity' => '211SMKMK09KMK2' , 
            'latitude'      => 24.4710078 , 
            'longitude'     => 39.757644 , 
        ]);
        //3
        Station::create([
            'avatar'        => 'default.png' , 
            'boss_avatar'   => 'default.png' , 
            'name'          => 'محطة وقود الدمام' , 
            'phone'         => '0503234567' , 
            'email'         => 'eldamam@gmail.com' , 
            'password'      => '123456' , 
            'city_id'       => 3 , 
            'active'        => 1 , 
            'block'         => 0 , 
            'boss_name'     => 'مدير فرع الدمام' , 
            'boss_phone'    => '0503234567' , 
            'boss_identity' => '211SMKMK09KMK2' , 
            'latitude'      => 26.3624931 , 
            'longitude'     => 50.1326268 , 
        ]);
        //4
        Station::create([
            'avatar'        => 'default.png' , 
            'boss_avatar'   => 'default.png' , 
            'name'          => 'محطة وقود القصيم' , 
            'phone'         => '0504234567' , 
            'email'         => 'Elqasem@gmail.com' , 
            'password'      => '123456' , 
            'city_id'       => 4 , 
            'active'        => 1 , 
            'block'         => 0 , 
            'boss_name'     => 'مدير فرع القصيم' , 
            'boss_phone'    => '0504234567' , 
            'boss_identity' => '211SMKMK09KMK2' , 
            'latitude'      => 26.3466525 , 
            'longitude'     => 45.3477512 , 
        ]);
        //5
        Station::create([
            'avatar'        => 'default.png' , 
            'boss_avatar'   => 'default.png' , 
            'name'          => 'محطة وقود جدة' , 
            'phone'         => '0505234567' , 
            'email'         => 'gada@gmail.com' , 
            'password'      => '123456' , 
            'city_id'       => 5 , 
            'active'        => 1 , 
            'block'         => 0 , 
            'boss_name'     => 'مدير فرع جدة' , 
            'boss_phone'    => '0505234567' , 
            'boss_identity' => '211SMKMK09KMK2' , 
            'latitude'      => 21.4491899 , 
            'longitude'     => 39.7716326 , 
        ]);
        //6
        Station::create([
            'avatar'        => 'default.png' , 
            'boss_avatar'   => 'default.png' , 
            'name'          => 'محطة وقود مكة' , 
            'phone'         => '0505234567' , 
            'email'         => 'makka@gmail.com' , 
            'password'      => '123456' , 
            'city_id'       => 6 , 
            'active'        => 1 , 
            'block'         => 0 , 
            'boss_name'     => 'مدير فرع مكة' , 
            'boss_phone'    => '0505234567' , 
            'boss_identity' => '211SMKMK09KMK2' , 
            'latitude'      => 21.4359571 , 
            'longitude'     => 39.9866333 , 
        ]);
    }
}
