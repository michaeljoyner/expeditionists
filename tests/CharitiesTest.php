<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/15/15
 * Time: 2:35 PM
 */

class CharitiesTest extends TestCase {

    use DatabaseMigrations, TestsImageUploads;

    /**
     * @test
     */
    public function a_new_charity_can_be_added()
    {
        $this->asAnAdminUser();
        $this->visit('/admin/charities')
            ->click('Add Charity')
            ->seeInDatabase('charities', [
                'name' => 'new charity',
                'site_link' => null
            ]);
    }

    /**
     * @test
     */
    public function a_charities_name_and_link_can_be_edited()
    {
        $charity = factory(\App\Charity::class)->create();

        $this->asAnAdminUser();
        $this->visit('/admin/charities/'.$charity->id.'/edit')
            ->type('Dymantic Design', 'name')
            ->type('https://dymanticdesign.com', 'site_link')
            ->press('Save Changes')
            ->seeInDatabase('charities', [
                'id' => $charity->id,
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

        $charity = factory(\App\Charity::class)->create();

        $response = $this->call('POST', '/admin/uploads/charities/'.$charity->id.'/image', [], [], [
            'file' => $this->prepareFileUpload('tests/testpic1.png')
        ]);

        $this->assertEquals(200, $response->status());
        $this->assertContains('/media', $charity->thumbImage(), 'has uploaded image');

        $charity->clearMediaCollection();
    }

    /**
     * @test
     */
    public function a_charity_can_be_deleted()
    {
        $this->withoutMiddleware();
        $this->asAnAdminUser();

        $charity = factory(\App\Charity::class)->create();

        $response = $this->call('DELETE', '/admin/charities/'.$charity->id);

        $this->assertEquals(302, $response->status());
        $this->notSeeInDatabase('charities', [
            'id' => $charity->id
        ]);
    }

}