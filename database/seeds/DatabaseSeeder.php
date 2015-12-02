<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(EditableContentSeeder::class);
        $this->call(GetInvolvedContentSeeder::class);
        $this->call(ExpeditionsTableSeeder::class);
        $this->call(SponsorsTableSeeder::class);
        $this->call(BlogArticlesTableSeeder::class);

        Model::reguard();
    }
}
