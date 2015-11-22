<?php

use Illuminate\Database\Seeder;

class ExpeditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,5) as $index) {
            $expedition = factory(\App\Expedition::class)->create();
            $expedition->addGallery('expedition gallery');
        }
    }
}
