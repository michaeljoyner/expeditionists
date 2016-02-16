<?php

use Illuminate\Database\Seeder;

class EditableContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home = factory(\App\Content\Page::class)->create(['name' => 'home']);
        $about = factory(\App\Content\Page::class)->create(['name' => 'about']);
        $expeditionists = factory(\App\Content\Page::class)->create(['name' => 'expeditionists']);
        $expeditions = factory(\App\Content\Page::class)->create(['name' => 'expeditions']);

        $editAbout = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $about->id,
            'name' => 'about us',
            'allows_html' => 1,
            'content' => '<h1>About Us</h1>'.
                         '<p>We, the people...</p>'
        ]);
        $editAbout = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $about->id,
            'name' => 'how it works',
            'allows_html' => 1,
            'content' => '<p>I would be surprised if it ever does</p>'
        ]);
        $editBanner = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Banner Text 1',
            'allows_html' => 0,
            'content' => 'Adventure with an Impact: Explore, Educate, Empower'
        ]);
        $editBanner2 = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Banner Text 2',
            'allows_html' => 0,
            'content' => 'Adventure with an Impact: Explore, Educate, Empower'
        ]);
        $editBanner3 = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Banner Text 3',
            'allows_html' => 0,
            'content' => 'Adventure with an Impact: Explore, Educate, Empower'
        ]);
        $editHomeAbout = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'About intro',
            'allows_html' => 0,
            'content' => 'We are not sparta!'
        ]);
        $editMissionShort = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Mission - short',
            'allows_html' => 0,
            'content' => 'To go places and see things'
        ]);
        $editMissionLong = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Mission - long',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        $editVisionShort = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Vision - short',
            'allows_html' => 0,
            'content' => 'See things everywhere'
        ]);
        $editVisionLong = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Vision - long',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        $editObjectivesShort = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Objectives - short',
            'allows_html' => 0,
            'content' => 'See things everywhere'
        ]);
        $editObjectivesLong = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Objectives - long',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        $editExpeditionistsIntro = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Expeditionists intro',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        $editExpeditionsIntro = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Expeditions intro',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        $editGetInvolvedIntro = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Charities Intro',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        $editSponsorsIntro = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Sponsors intro',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        $editExpeditionistsPageIntro = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $expeditionists->id,
            'name' => 'Intro',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);
        $editExpeditionsPageIntro = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $expeditions->id,
            'name' => 'Intro',
            'allows_html' => 0,
            'content' => 'Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel'
        ]);




    }
}
