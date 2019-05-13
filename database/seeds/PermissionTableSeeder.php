<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [
            [
                'id' => '1',
                'name' => 'canadmin',
                'label' => 'Power max',
            ],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
