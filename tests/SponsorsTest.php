<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/15/15
 * Time: 11:42 AM
 */

class SponsorsTest extends TestCase {

    use DatabaseMigrations, TestsImageUploads;

    /**
     * @test
     */
    public function a_sponsor_can_be_created()
    {
        $this->asAnAdminUser();
        $this->visit('/admin/sponsors')
            ->click('Add Sponsor')
            ->seeInDatabase('sponsors', [
                'name' => 'new sponsor',
                'site_link' => null
            ]);
    }

    /**
     * @test
     */
    public function a_sponsors_name_and_link_can_be_edited()
    {
        $sponsor = factory(\App\Sponsor::class)->create();

        $this->asAnAdminUser();
        $this->visit('/admin/sponsors/'.$sponsor->id.'/edit')
            ->type('Dymantic Design', 'name')
            ->type('https://dymanticdesign.com', 'site_link')
            ->press('Save Changes')
            ->seeInDatabase('sponsors', [
                'id' => $sponsor->id,
                'name' => 'Dymantic Design',
                'site_link' => 'https://dymanticdesign.com'
            ]);
    }

    /**
     * @test
     */
    public function a_sponsors_image_can_be_uploaded()
    {
        $this->withoutMiddleware();
        $this->asAnAdminUser();

        $sponsor = factory(\App\Sponsor::class)->create();

        $response = $this->call('POST', '/admin/uploads/sponsors/'.$sponsor->id.'/image', [], [], [
            'file' => $this->prepareFileUpload('tests/testpic1.png')
        ]);

        $this->assertEquals(200, $response->status());
        $this->assertContains('/media', $sponsor->thumbImage(), 'has uploaded image');

        $sponsor->clearMediaCollection();
    }

    /**
     * @test
     */
    public function a_sponsor_can_be_deleted()
    {
        $this->withoutMiddleware();
        $this->asAnAdminUser();

        $sponsor = factory(\App\Sponsor::class)->create();

        $response = $this->call('DELETE', '/admin/sponsors/'.$sponsor->id);

        $this->assertEquals(302, $response->status());
        $this->notSeeInDatabase('sponsors', [
            'id' => $sponsor->id
        ]);
    }

}