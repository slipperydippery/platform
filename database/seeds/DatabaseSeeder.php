<?php

use App\User;
use App\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ScanmodelTableSeeder::class);
        $this->call(InstantieTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(ThemeTableSeeder::class);
        $this->call(QuestionTableSeeder::class);

        
        factory(App\User::class, 10)->create()->each(function ($user) {
    		$scan = $user->scans()->save(factory(App\Scan::class)->make());
    		$group = $scan->ownsgroups()->save(factory(App\Group::class)->make());
    		$user->groups()->save($group);
    		$scan->title = $group->title;
    		$scan->group()->associate($group);
    		$scan->save();
    		Question::generateAnswers($scan);
    		
    	});
    }
}
