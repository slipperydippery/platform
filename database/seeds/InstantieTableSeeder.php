<?php

use Illuminate\Database\Seeder;

class InstantieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instanties')->delete();

        $instanties = [
            [
                'title' => 'Scholen',
                'description' => 'Scholen (met name VSO, PrO en MBO)',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Sociale Diensten',
                'description' => 'Sociale Diensten / Werkbedrijf',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'RMC',
                'description' => 'Leerplicht / RMC',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Werkgevers ',
                'description' => 'Werkgevers / Werkgeversservicepunt / S-BB',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Zorg',
                'description' => 'Zorg (bijv MEE, Jeugdzorg)',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Gemeente',
                'description' => 'Gemeente',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Overig',
                'description' => 'Overig (bijv UWV of een specifieke regionale organisatie)',
                'scanmodel_id' => '1'
            ],
        ];

        DB::table('instanties')->insert($instanties);
    }
}
