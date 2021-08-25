<?php

use App\Models\Worker;
use Illuminate\Database\Seeder;

class WorkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Worker::create([
            'avatar'        => 'default.png' , 
            'name'          => 'عامل محطة وقود الرياض' , 
            'phone'         => '0501134567' , 
            'identity'      => '0501134567' , 
            'password'      => 123456 ,  
            'city_id'       => 1 , 
            'station_id'    => 1 , 
            'salary'        => 2000 , 
        ]);
        Worker::create([
            'avatar'        => 'default.png' , 
            'name'          => 'عامل محطة وقود المدينة' , 
            'phone'         => '0502234567' , 
            'identity'      => '0502234567' , 
            'password'      => 123456 , 
            'city_id'       => 2 , 
            'station_id'    => 2 , 
            'salary'        => 2000 , 
        ]);
        Worker::create([
            'avatar'        => 'default.png' , 
            'name'          => 'عامل محطة وقود الدمام' , 
            'phone'         => '050334567' , 
            'identity'      => '050334567' , 
            'password'      => 123456 ,  
            'city_id'       => 3 , 
            'station_id'    => 3 , 
            'salary'        => 2000 , 
        ]);
        Worker::create([
            'avatar'        => 'default.png' , 
            'name'          => 'عامل محطة وقود القصيم' , 
            'phone'         => '050445667' , 
            'identity'      => '050445667' , 
            'password'      => 123456 , 
            'city_id'       => 4 , 
            'station_id'    => 4 , 
            'salary'        => 2000 , 
        ]);
        Worker::create([
            'avatar'        => 'default.png' , 
            'name'          => 'عامل محطة وقود جدة' , 
            'phone'         => '05055667' , 
            'identity'      => '05055667' , 
            'password'      => 123456 , 
            'city_id'       => 5 , 
            'station_id'    => 5 , 
            'salary'        => 2000 , 
        ]);
        Worker::create([
            'avatar'        => 'default.png' , 
            'name'          => 'عامل محطة وقود مكة' , 
            'phone'         => '05056667' , 
            'identity'      => '05056667' , 
            'password'      => 123456 , 
            'city_id'       => 6 , 
            'station_id'    => 6 , 
            'salary'        => 2000 , 
        ]);
    }
}
