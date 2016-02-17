<?php

use Illuminate\Database\Seeder;


class GetInvolvedContentSeeder extends Seeder
{

    public function run()
    {
        $page = factory(\App\Content\Page::class)->create(['name' => 'get involved']);
        $contact = factory(\App\Content\Page::class)->create(['name' => 'contact us']);
        //main intro
        factory(\App\Content\EditableArea::class)->create([
            'page_id' => $page->id,
            'name' => 'intro',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        //expeditionists
        factory(\App\Content\EditableArea::class)->create([
            'page_id' => $page->id,
            'name' => 'donate',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        //sponsors
        factory(\App\Content\EditableArea::class)->create([
            'page_id' => $page->id,
            'name' => 'sponsors',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        //charities
        factory(\App\Content\EditableArea::class)->create([
            'page_id' => $page->id,
            'name' => 'charities',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        //get in touch
        factory(\App\Content\EditableArea::class)->create([
            'page_id' => $page->id,
            'name' => 'become an expeditionist',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        factory(\App\Content\EditableArea::class)->create([
            'page_id' => $page->id,
            'name' => 'become a volunteer',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        factory(\App\Content\EditableArea::class)->create([
            'page_id' => $contact->id,
            'name' => 'contact page intro',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
    }

}