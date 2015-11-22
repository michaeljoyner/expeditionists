<?php

use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Sponsor::class, 3)->create();
        factory(\App\Charity::class, 3)->create();
    }
}
