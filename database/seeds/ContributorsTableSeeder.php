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
            ['login' => 'jasonlewis', 'name' => 'Jason Lewis'],
            ['login' => 'GrahamCampbell', 'name' => 'Graham Campbell'],
            ['login' => 'franzliedke', 'name' => 'Franz Liedke'],
            ['login' => 'daylerees', 'name' => 'Dayle Rees'],
            ['login' => 'taylorotwell', 'name' => 'Taylor Otwell'],
        ]);
    }
}
