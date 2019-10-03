<?php

use Illuminate\Database\Seeder;

class OrganisatieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisaties')->delete();

        $organisaties = [
            [
                'title' => 'Scholen Vso',
                'description' => '',
                'leefgebied_id' => '1'
            ],
            [
                'title' => 'Scholen Pro',
                'description' => '',
                'leefgebied_id' => '1'
            ],
            [
                'title' => 'Scholen Entree',
                'description' => '',
                'leefgebied_id' => '1'
            ],
            [
                'title' => 'Scholen MBO',
                'description' => '',
                'leefgebied_id' => '1'
            ],
            [
                'title' => 'RMC / leerplict',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'Gemeente afd Werk en Inkomen (sociale dienst/werkbedrijf)',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'Jeugdhulp',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'WMO',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'Wijkteams',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'Werkgevers',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Werkgevers servicepunt (WSP)',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'SBB',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Sociale dienst',
                'description' => '',
                'leefgebied_id' => '4'
            ],
            [
                'title' => '(gemeentelijk werkbedrijf)',
                'description' => '',
                'leefgebied_id' => '4'
            ],
            [
                'title' => 'Jeugdzorg',
                'description' => '',
                'leefgebied_id' => '5'
            ],
            [
                'title' => 'Zorgaanbieders',
                'description' => '',
                'leefgebied_id' => '5'
            ],
            [
                'title' => 'Mee',
                'description' => '',
                'leefgebied_id' => '5'
            ],
            [
                'title' => 'Zorgverzekeraar',
                'description' => '',
                'leefgebied_id' => '5'
            ],
            [
                'title' => 'Huisarts',
                'description' => '',
                'leefgebied_id' => '5'
            ],
            [
                'title' => 'Maatschappelijke organisaties',
                'description' => '',
                'leefgebied_id' => '5'
            ],
            [
                'title' => 'UWV',
                'description' => '',
                'leefgebied_id' => '6'
            ],
            [
                'title' => 'Specifieke lokale organisatie/ sociale initiatieven',
                'description' => '',
                'leefgebied_id' => '6'
            ],
            [
                'title' => 'Vrijwilligersorganisaties',
                'description' => '',
                'leefgebied_id' => '6'
            ],
        ];

        DB::table('organisaties')->insert($organisaties);
    }
}
