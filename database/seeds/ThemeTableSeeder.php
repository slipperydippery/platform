<?php

use Illuminate\Database\Seeder;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->delete();

        $themes = [
            [
                'id' => '1',
                'title' => 'Focus op werk en talent',
                'short' => 'QkgxPzrw830',
                'body' => '',
                'scanmodel_id' => '1',
                'order' => '1',
            ],
            [
                'id' => '2',
                'title' => 'Kwaliteit begeleiding',
                'short' => '5GvoHHA8R4A',
                'body' => '',
                'scanmodel_id' => '1',
                'order' => '2',
            ],
            [
                'id' => '3',
                'title' => 'Randvoorwaarden voor goede begeleiding',
                'short' => '5sucjfXzDUY',
                'body' => '',
                'scanmodel_id' => '1',
                'order' => '3',
            ],
            [
                'id' => '4',
                'title' => 'Effectieve samenwerking',
                'short' => 'FALozhQ_q5c',
                'body' => '',
                'scanmodel_id' => '1',
                'order' => '4',
            ],
        ];

        DB::table('themes')->insert($themes);

    }
}
