<?php

use Illuminate\Database\Seeder;

class EditableAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Content\EditableArea::class)->create(['allows_html' => 1]);
    }
}
