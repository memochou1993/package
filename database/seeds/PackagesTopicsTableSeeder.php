<?php

use Illuminate\Database\Seeder;

class PackagesTopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PackageTopic::class, 100)->create();
    }
}
