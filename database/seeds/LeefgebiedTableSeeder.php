<?php

use Illuminate\Database\Seeder;

class LeefgebiedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leefgebieds')->delete();

        $leefgebieds = [
            [
                'title' => 'Onderwijs',
                'description' => ''
            ],
            [
                'title' => 'Overheid (gemeente)',
                'description' => ''
            ],
            [
                'title' => 'Werk',
                'description' => ''
            ],
            [
                'title' => 'Inkomen',
                'description' => ''
            ],
            [
                'title' => 'Zorg',
                'description' => ''
            ],
            [
                'title' => 'Overig',
                'description' => ''
            ],
        ];

        DB::table('leefgebieds')->insert($leefgebieds);
    }
}
