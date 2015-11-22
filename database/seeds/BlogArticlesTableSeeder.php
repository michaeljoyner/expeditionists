<?php

use Illuminate\Database\Seeder;

class BlogArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Blog\Article::class, 20)->create();
    }
}
