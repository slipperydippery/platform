<?php

use Illuminate\Database\Seeder;

class DivisieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisies')->delete();

        $divisies = [
            [
                'title' => 'Scholen Vso',
                'description' => '',
                'instantie_id' => '1'
            ],
            [
                'title' => 'Scholen Pro',
                'description' => '',
                'instantie_id' => '1'
            ],
            [
                'title' => 'Scholen Entree',
                'description' => '',
                'instantie_id' => '1'
            ],
            [
                'title' => 'Scholen MBO',
                'description' => '',
                'instantie_id' => '1'
            ],
            [
                'title' => 'RMC / leerplict',
                'description' => '',
                'instantie_id' => '2'
            ],
            [
                'title' => 'Gemeente afd Werk en Inkomen (sociale dienst/werkbedrijf)',
                'description' => '',
                'instantie_id' => '2'
            ],
            [
                'title' => 'Jeugdhulp',
                'description' => '',
                'instantie_id' => '2'
            ],
            [
                'title' => 'WMO',
                'description' => '',
                'instantie_id' => '2'
            ],
            [
                'title' => 'Wijkteams',
                'description' => '',
                'instantie_id' => '2'
            ],
            [
                'title' => 'Werkgevers',
                'description' => '',
                'instantie_id' => '3'
            ],
            [
                'title' => 'Werkgevers servicepunt (WSP)',
                'description' => '',
                'instantie_id' => '3'
            ],
            [
                'title' => 'SBB',
                'description' => '',
                'instantie_id' => '3'
            ],
            [
                'title' => 'Sociale dienst',
                'description' => '',
                'instantie_id' => '4'
            ],
            [
                'title' => '(gemeentelijk werkbedrijf)',
                'description' => '',
                'instantie_id' => '4'
            ],
            [
                'title' => 'Jeugdzorg',
                'description' => '',
                'instantie_id' => '5'
            ],
            [
                'title' => 'Zorgaanbieders',
                'description' => '',
                'instantie_id' => '5'
            ],
            [
                'title' => 'Mee',
                'description' => '',
                'instantie_id' => '5'
            ],
            [
                'title' => 'Zorgverzekeraar',
                'description' => '',
                'instantie_id' => '5'
            ],
            [
                'title' => 'Huisarts',
                'description' => '',
                'instantie_id' => '5'
            ],
            [
                'title' => 'Maatschappelijke organisaties',
                'description' => '',
                'instantie_id' => '5'
            ],
            [
                'title' => 'UWV',
                'description' => '',
                'instantie_id' => '6'
            ],
            [
                'title' => 'Specifieke lokale organisatie/ sociale initiatieven',
                'description' => '',
                'instantie_id' => '6'
            ],
            [
                'title' => 'Vrijwilligersorganisaties',
                'description' => '',
                'instantie_id' => '6'
            ],
        ];

        DB::table('divisies')->insert($divisies);
    }
}
