<?php

use App\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->delete();

        $role_user = [
            [
                'role_id' => '1',
                'user_id' => User::where('email', 'maartendejager@gmail.com')->first()->id
            ],
            [
                'role_id' => '2',
                'user_id' => User::where('email', 'maartendejager@gmail.com')->first()->id
            ],
            [
                'role_id' => '2',
                'user_id' => User::where('email', 'susanne@embav.nl')->first()->id
            ],
        ];

        DB::table('role_user')->insert($role_user);
    }
}
