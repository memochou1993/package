<?php

use Illuminate\Database\Seeder;

class ContributorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contributor::class, 100)->create();

        App\Contributor::insert([
            ['login' => 'jasonlewis'],
            ['login' => 'GrahamCampbell'],
            ['login' => 'franzliedke'],
            ['login' => 'daylerees'],
            ['login' => 'taylorotwell'],
        ]);
    }
}
