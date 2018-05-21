<?php

use Illuminate\Database\Seeder;

class PackagesTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PackageTag::class, 100)->create();
    }
}
