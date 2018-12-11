<?php

use Illuminate\Database\Seeder;

class ScanmodelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scanmodels')->delete();

        $scanmodels = [
            [
                'id' => '1',
                'title' => 'Participatiescan',
                'short' => '',
                'body' => '',
            ],
        ];

        DB::table('scanmodels')->insert($scanmodels);
    }
}
