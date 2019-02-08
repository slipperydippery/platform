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
        $this->call(UserTableSeeder::class);
        $this->call(ScanmodelTableSeeder::class);
        $this->call(InstantieTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
    }
}
