<?php

use App\User;
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
        DB::table('users')->delete();

        $users = [
            [
                'name' => 'Maarten de Jager',
                'phone_number' => '+31685033970',
                'email' => 'maartendejager@gmail.com',
                'password' => Hash::make('password'),
                'dev' => 1,
                'verified' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Susanne Meeuwissen',
                'phone_number' => '+31685033971',
                'email' => 'susanne@embav.nl',
                'password' => Hash::make('password'),
                'dev' => 1,
                'verified' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
            ],
        ];

        DB::table('users')->insert($users);

        factory(User::class, 5)->create();
    }
}
