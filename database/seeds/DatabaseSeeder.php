<?php

use App\User;
use App\Followup;
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
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(QuestionTableSeeder::class);

        
        factory(App\User::class, 10)->create()->each(function ($user) {
    		$scan = $user->scans()->save(factory(App\Scan::class)->make());
    		$group = $scan->ownsgroups()->save(factory(App\Group::class)->make());
            $followup = $group->followup()->save(factory(App\Followup::class)->make());
            factory(App\User::class, 10)->create()->each(function ($user) use ($group) {
                $scan = $user->scans()->save(factory(App\Scan::class)->make());
                Question::generateAnswers($scan);
                $group->scans()->save($scan);
            });
    		$user->groups()->save($group);
    		$scan->title = $group->title;
    		$scan->group()->associate($group);
    		$scan->save();
    		Question::generateAnswers($scan);
    		
    	});
    }
}
