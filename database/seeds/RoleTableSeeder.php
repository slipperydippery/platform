<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            [
                'id' => '1',
                'name' => 'megadmin',
                'label' => 'Admin voor white label scans',
                'scanmodel_id' => '1',
            ],
            [
                'id' => '2',
                'name' => 'scadmin',
                'label' => 'Admin voor de Participatiescan',
                'scanmodel_id' => '1',
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
