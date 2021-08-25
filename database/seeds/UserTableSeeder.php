<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'admin',
            'email'     => 'aait@info.com',
            'phone'     => '0555105813',
            'password'  => 123456,
            'user_type' =>'admin',
            'role_id'   => 1,
            'active'    => 1,
        ]);

        User::create([
            'name'          => 'ahmed',
            'email'         => 'ahmed@gmail.com',
            'phone'         => '1069541294',
            'password'      => 123456,
            'user_type'     => 'user',
            'active'        => 1,
            'address'       => 'السعودية - الرياض' ,
            'latitude'      => 24.7241504 , 
            'longitude'     => 47.3830068 ,
            'identity'      => '121040213421408' ,
            'gender'        => 'male' ,
            'birthdate'     => Carbon::now() ,
        ]);
        User::create([
            'name'          => 'yasser',
            'email'         => 'yasser@gmail.com',
            'phone'         => '1069541293',
            'password'      => 123456,
            'user_type'     => 'user',
            'active'        => 1,
            'address'       => 'السعودية - مكه' ,
            'latitude'      => 21.4359571 , 
            'longitude'     => 39.9866333 , 
            'identity'      => '121040213421308' ,
            'gender'        => 'male' ,
            'birthdate'     => Carbon::now() ,
            'subscribed'    => true , 
            'subscribe_end' => Carbon::now()->addDays(20) ,
        ]);
        User::create([
            'name'          => 'roshdy',
            'email'         => 'roshdy@gmail.com',
            'phone'         => '1069541290',
            'password'      => 123456,
            'user_type'     => 'user',
            'active'        => 0 ,
            'block'         => 1 ,
            'address'       => 'السعودية - القصيم' ,
            'latitude'      => 26.3466525 , 
            'longitude'     => 45.3477512 , 
            'identity'      => '12104021342142' ,
            'gender'        => 'male' ,
            'birthdate'     => Carbon::now() ,
            'subscribed'    => false , 
            'subscribe_end' => Carbon::now()->subDays(20) ,
        ]);
    }
}
