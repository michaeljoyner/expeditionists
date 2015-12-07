<?php

use App\User;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function asLoggedInUser(array $defaults = [])
    {
        $user = factory(User::class)->create($defaults);
        $this->actingAs($user);

        return $user;
    }

    protected function makeAdminUser()
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $user = factory(User::class)->create();
        factory(\App\Profile::class)->create(['user_id' => $user->id]);
        $user->assignRole($role);

        return $user;
    }

    protected function asAnAdminUser()
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $user = factory(User::class)->create();
        factory(\App\Profile::class)->create(['user_id' => $user->id]);
        $user->assignRole($role);
        $this->actingAs($user);
    }

    protected function preparePageContent()
    {
        $home = factory(\App\Content\Page::class)->create(['name' => 'home']);
        $about = factory(\App\Content\Page::class)->create(['name' => 'about']);
        $expeditionists = factory(\App\Content\Page::class)->create(['name' => 'expeditionists']);
        $expeditions = factory(\App\Content\Page::class)->create(['name' => 'expeditions']);

        $editAbout = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $about->id,
            'name' => 'about',
            'allows_html' => 1,
            'content' => '<h1>About Us</h1>'.
                '<p>We, the people...</p>'
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
        $editContactIntro = factory(\App\Content\EditableArea::class)->create([
            'page_id' => $home->id,
            'name' => 'Contact intro',
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
