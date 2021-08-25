<?php

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'name'              => ['ar' => 'بنك الراجحي ' , 'en' => 'Elraghy Bank'] ,
            'iban'              => '122424GAnmdsmvAr3KKK71526',
            'account_number'    => '3214392534324324',
            'account_name'      => '3214392534324324',
            'icon'              => 'raghy.png',
        ]);
        Bank::create([
            'name'              => ['ar' => 'بنك القاهره ' , 'en' => 'Cairo Bank'] ,
            'iban'              => '122424GAnmdsmvAr3KKK71526',
            'account_number'    => '3214392534324324',
            'account_name'      => '3214392534324324',
            'icon'              => 'Cairo.png',
        ]);
        Bank::create([
            'name'              => ['ar' => 'بنك سامبا ' , 'en' => 'Samba Bank'] ,
            'iban'              => '122424GAnmdsmvAr3KKK71526',
            'account_number'    => '3214392534324324',
            'account_name'      => '3214392534324324',
            'icon'              => 'Samba.png',
        ]);
        Bank::create([
            'name'              => ['ar' => 'بنك سي اي بي ' , 'en' => 'CIB Bank'] ,
            'iban'              => '122424GAnmdsmvAr3KKK71526',
            'account_number'    => '3214392534324324',
            'account_name'      => '3214392534324324',
            'icon'              => 'CIB.png',
        ]);
        Bank::create([
            'name'              => ['ar' => 'بنك العربي ' , 'en' => 'ElAraby Bank'] ,
            'iban'              => '122424GAnmdsmvAr3KKK71526',
            'account_number'    => '3214392534324324',
            'account_name'      => '3214392534324324',
            'icon'              => 'araby.png',
        ]);
    }
}
