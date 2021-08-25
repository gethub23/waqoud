<?php

use App\Models\Complaint;
use Illuminate\Database\Seeder;

class ComplaintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complaint::create([
            'user_name'   => 'ahmed abdullah' , 
            'user_id'     => 1 , 
            'station_id'  => 1 , 
            'complaint'   => 'معامله سيئه جدا جدا' , 
            'phone'       => '001332422442' , 
        ]);
    }
}
