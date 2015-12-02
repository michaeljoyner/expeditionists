<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/5/15
 * Time: 10:17 AM
 */
class ProfilesTest extends TestCase
{

    use DatabaseMigrations, TestsImageUploads;

    /**
     * @test
     */
    public function it_creates_a_profile_for_the_user_when_the_user_is_added()
    {
        $this->preparePageContent();
        $this->asAnAdminUser();

        $newUser = $this->registerNewUser();

        $this->seeInDatabase('profiles', [
            'user_id' => $newUser->id
        ]);
    }

    /**
     * @test
     */
    public function it_can_be_edited()
    {
        $profile = factory(\App\Profile::class)->create();
        $user = \App\User::findOrFail($profile->user_id);

        $this->actingAs($user)
            ->visit('/admin/profiles/' . $profile->id . '/edit')
            ->type('Funky Town', 'residence')
            ->press('Save Changes')
            ->seeInDatabase('profiles', [
                'id'       => $profile->id,
                'residence' => 'Funky Town'
            ]);
    }

    /**
     * @test
     */
    public function it_can_only_be_edited_by_its_owner()
    {
        $profile = factory(\App\Profile::class)->create();
        $user = factory(\App\User::class)->create();

        $this->assertFalse($profile->user_id === $user->id, 'The user is not the profile owner');

        try {
            $this->actingAs($user)
                ->visit('/admin/profiles/'.$profile->id.'/edit')
                ->type('Funky Town', 'residence')
                ->press('Save Changes');
        } catch (Exception $e) {
            $this->assertContains ("Received status code [403]",$e->getMessage());
        }

        $this->notSeeInDatabase('profiles', [
            'id' => $profile->id,
            'residence' => 'Funky Town'
        ]);

    }

    /**
     * @test
     */
    public function it_can_be_deleted()
    {
        $user = factory(\App\User::class)->create();
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id]);

        $this->withoutMiddleware();
        $this->actingAs($user)
            ->call('DELETE', '/admin/profiles/'.$profile->id);
        $this->notSeeInDatabase('profiles', ['id' => $profile->id]);
    }

    /**
     * @test
     */
    public function it_can_only_be_deleted_by_its_owner()
    {
        $user = factory(\App\User::class)->create();
        $profile = factory(\App\Profile::class)->create();

        $this->assertFalse($user->id === $profile->user_id);

        $this->withoutMiddleware();
        $this->actingAs($user);

        try {
            $this->call('DELETE', '/admin/profiles/'.$profile->id);
        } catch (Exception $e) {
            $this->assertContains ("Received status code [403]",$e->getMessage());
        }

        $this->seeInDatabase('profiles', [
            'id' => $profile->id
        ]);

    }

    /**
     * @test
     */
    public function a_profile_pic_can_be_uploaded()
    {
        $this->withoutMiddleware();
        $profile = factory(\App\Profile::class)->create();
        $this->asLoggedInUser();

        $response = $this->call('POST', '/admin/uploads/profiles/'.$profile->id.'/profilepic', [], [], [
            'file' => $this->prepareFileUpload('tests/testpic1.png'),
        ]);

        $this->assertEquals($response->status(), 200);

        $this->assertContains('media/', $profile->profilePic(), 'has uploaded profile img');

        $profile->clearMediaCollection();
    }

    /**
     * @test
     */
    public function a_profile_has_only_a_single_profile_pic_which_is_the_latest_uploaded()
    {
        $profile = factory(\App\Profile::class)->create();

        $profile->setProfilePic(realpath('tests/testpic1.png'), 'testpic1.png');
        $profile->setProfilePic(realpath('tests/testpic2.png'), 'testpic2.png');

        $this->assertEquals(1, $profile->getMedia()->count());

        $this->assertContains('testpic2', $profile->getMedia()[0]->name);

        $profile->clearMediaCollection();

    }

    /**
     * @test
     */
    public function a_profile_has_at_least_one_gallery()
    {
        $this->preparePageContent();
        $this->asAnAdminUser();
        $newUser = $this->registerNewUser();

        $profile = $newUser->profile;

        $galleryCount = $profile->galleries->count();
        $this->assertGreaterThan(0, $galleryCount, 'gallery count should exceed zero');
    }

    /**
     * @test
     */
    public function a_file_can_be_uploaded_to_a_gallery()
    {
        $this->withoutMiddleware();
        $this->asLoggedInUser();

        $gallery = factory(\App\Gallery::class)->create();

        $response = $this->call('POST', '/admin/uploads/galleries/'.$gallery->galleryable_id.'/images/', [], [], [
            'file' => $this->prepareFileUpload('tests/testpic1.png'),
        ]);

        $this->assertEquals($response->status(), 200);
        $this->assertGreaterThan(0, $gallery->getMedia()->count(), 'gallery should have more than one image');


        $gallery->clearMediaCollection();
    }

    private function registerNewUser()
    {
        $newUser = factory(\App\User::class)->make();

        $this->visit('/admin/register')
            ->submitForm('Register', [
                'name'                  => $newUser->name,
                'email'                 => $newUser->email,
                'password'              => 'password',
                'password_confirmation' => 'password'
            ])->seeInDatabase('users', [
                'name'  => $newUser->name,
                'email' => $newUser->email
            ]);

        $user = \App\User::where('email', $newUser->email)->firstOrFail();

        return $user;
    }



}