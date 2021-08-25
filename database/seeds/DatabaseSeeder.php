<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CityTableSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(IntroTableSeeder::class);
        $this->call(StationTableSeeder::class);
        $this->call(WorkerTableSeeder::class);
        $this->call(PackageTableSeeder::class);
        $this->call(BankTableSeeder::class);
        $this->call(SocialTableSeeder::class);
        $this->call(ComplaintTableSeeder::class);
        $this->call(FuelTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(IntroSliderTableSeeder::class);
        $this->call(IntroServiceTableSeeder::class);
        $this->call(IntroFqsCategoryTableSeeder::class);
        $this->call(IntroFqsTableSeeder::class);
        $this->call(IntroPartenerTableSeeder::class);
        $this->call(IntroHowWorkTableSeeder::class);
        $this->call(IntroSocialTableSeeder::class);
    }
}
