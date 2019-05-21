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

        $user_maarten = new User([
            'name' => 'Maarten de Jager',
            'phone_number' => '+31685033970',
            'email' => 'maartendejager@gmail.com',
            'password' => Hash::make('password'),
            'dev' => 1,
            'verified' => 1,
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);
        $user_maarten->save();

        $user_susanne = new User([
                'name' => 'Susanne Meeuwissen',
                'phone_number' => '+31685033971',
                'email' => 'susanne@embav.nl',
                'password' => Hash::make('password'),
                'dev' => 1,
                'verified' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
        ]);
        $user_susanne->save();

        $user_indra = new User([
                'name' => 'Indra van der Valk',
                'phone_number' => '+31600055500',
                'email' => 'indra.vandervalk@ecorys.com',
                'password' => Hash::make('password'),
                'dev' => 1,
                'verified' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
        ]);
        $user_indra->save();
    }
}
