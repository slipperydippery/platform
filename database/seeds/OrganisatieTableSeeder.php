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
                'title' => 'Scholen Entree opleidingen',
                'description' => '',
                'leefgebied_id' => '1'
            ],
            [
                'title' => 'Scholen Middelbare scholen',
                'description' => '',
                'leefgebied_id' => '1'
            ],
            [
                'title' => 'Scholen MBO',
                'description' => '',
                'leefgebied_id' => '1'
            ],
            [
                'title' => 'RMC / leerplicht',
                'description' => '',
                'leefgebied_id' => '1'
            ],
            [
                'title' => 'Werkgevers',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'Werkgevers servicepunt (WSP)',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'SBB',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'Gemeentelijk werkbedrijf',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'Gemeente afd Werk en Inkomen (sociale dienst/werkbedrijf)',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'UWV',
                'description' => '',
                'leefgebied_id' => '2'
            ],
            [
                'title' => 'GGD/JGZ',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Jeugdhulp aanbieders / jeugdteams',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Zwaardere jeugdhulp aanbieders',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Gecertificeerde instellingen (drang en dwang kader)',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Mee',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Zorgverzekeraar',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Huisarts',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Afdeling WMO gemeente',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Wijkteams',
                'description' => '',
                'leefgebied_id' => '3'
            ],
            [
                'title' => 'Woningcorporaties',
                'description' => '',
                'leefgebied_id' => '4'
            ],
            [
                'title' => 'Particuliere verhuurders',
                'description' => '',
                'leefgebied_id' => '4'
            ],
            [
                'title' => 'Specifieke lokale organisatie/ sociale initiatieven',
                'description' => '',
                'leefgebied_id' => '5'
            ],
            [
                'title' => '(Lokale) Vrijwilligersorganisaties',
                'description' => '',
                'leefgebied_id' => '5'
            ],
            [
                'title' => 'Gecertificeerde instellingen',
                'description' => '',
                'leefgebied_id' => '6'
            ],
            [
                'title' => 'Veilig Thuis',
                'description' => '',
                'leefgebied_id' => '6'
            ],
            [
                'title' => 'Jeugdbescherming',
                'description' => '',
                'leefgebied_id' => '6'
            ],
            [
                'title' => 'Politie',
                'description' => '',
                'leefgebied_id' => '6'
            ],
            [
                'title' => 'Bureau Halt',
                'description' => '',
                'leefgebied_id' => '6'
            ],
        ];

        DB::table('organisaties')->insert($organisaties);
    }
}
