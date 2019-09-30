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
                'title' => 'Directeur',
                'description' => '',
                'instantie_id' => '1'
            ],
            [
                'title' => 'Juf / meester',
                'description' => '',
                'instantie_id' => '1'
            ],
            [
                'title' => 'Schoolbestuur',
                'description' => '',
                'instantie_id' => '1'
            ],
            [
                'title' => 'Sociaal medewerker',
                'description' => '',
                'instantie_id' => '2'
            ],
            [
                'title' => 'Leerplichtambtenaar',
                'description' => '',
                'instantie_id' => '3'
            ],
        ];

        DB::table('divisies')->insert($divisies);
    }
}
