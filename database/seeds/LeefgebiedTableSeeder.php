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
                'title' => 'Werk, Inkomen en schulden',
                'description' => ''
            ],
            [
                'title' => 'Zorg',
                'description' => ''
            ],
            [
                'title' => 'Wonen',
                'description' => ''
            ],
            [
                'title' => 'Vrije tijd',
                'description' => ''
            ],
            [
                'title' => 'Veiligheid',
                'description' => ''
            ],
        ];

        DB::table('leefgebieds')->insert($leefgebieds);
    }
}
