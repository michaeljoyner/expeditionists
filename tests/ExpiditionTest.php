<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/6/15
 * Time: 10:46 AM
 */

class ExpeditionTest extends TestCase {

    use DatabaseMigrations, TestsImageUploads;

    /**
     * @test
     */
    public function it_can_be_created()
    {
        $expedition = factory(App\Expedition::class)->make();
        $this->asLoggedInUser();
        $this->visit('/admin/expeditions/create')
            ->submitForm('Create Expedition', [
                'name' => $expedition->name,
                'location' => $expedition->location
            ])
            ->seeInDatabase('expeditions', [
                'name' => $expedition->name,
                'location' => $expedition->location
            ]);
    }

    /**
     * @test
     */
    public function it_can_be_edited()
    {
        $expedition = factory(\App\Expedition::class)->create();
        $this->asLoggedInUser();

        $this->visit('/admin/expeditions/'.$expedition->id.'/edit')
            ->type('Moozes Adventure', 'name')
            ->type('Kazikstan', 'location')
            ->press('Save Changes')
            ->seeInDatabase('expeditions', [
                'id' => $expedition->id,
                'name' => 'Moozes Adventure',
                'location' => 'Kazikstan'
            ]);
    }

    /**
     * @test
     */
    public function it_can_be_deleted()
    {
        $expedition = factory(\App\Expedition::class)->create();
        $this->asLoggedInUser();
        $this->withoutMiddleware();

        $this->call('DELETE', '/admin/expeditions/'.$expedition->id);
        $this->notSeeInDatabase('expeditions', ['id' => $expedition->id]);
    }

    /**
     * @test
     */
    public function an_image_for_cover_pic_can_be_uploaded()
    {
        $this->withoutMiddleware();
        $expedition = factory(\App\Expedition::class)->create();
        $this->asLoggedInUser();

        $response = $this->call('POST', '/admin/uploads/expeditions/'.$expedition->id.'/coverpic', [], [], [
            'file' => $this->prepareFileUpload('tests/testpic1.png'),
        ]);

        $this->assertEquals($response->status(), 200);

        $this->assertContains('media/', $expedition->coverPic(), 'has uploaded profile img');

        $expedition->clearMediaCollection();
    }

    /**
     * @test
     */
    public function an_expedition_can_only_have_a_single_cover_image()
    {
        $expedition = factory(\App\Expedition::class)->create();

        $expedition->setCoverPic(realpath('tests/testpic1.png'), 'testpic1.png');
        $expedition->setCoverPic(realpath('tests/testpic2.png'), 'testpic2.png');

        $this->assertEquals(1, $expedition->getMedia()->count());

        $this->assertContains('testpic2', $expedition->getMedia()[0]->name);

        $expedition->clearMediaCollection();
    }

    /**
     * @test
     */
    public function images_can_be_uploaded_to_the_expedition_gallery()
    {
        $this->withoutMiddleware();
        $this->asLoggedInUser();

        $expedition = factory(\App\Expedition::class)->create();
        $gallery = factory(\App\Gallery::class)->create(['galleryable_id' => $expedition->id, 'galleryable_type' => \App\Expedition::class]);

        $response = $this->call('POST', '/admin/uploads/galleries/'.$gallery->galleryable_id.'/images', [], [], [
            'file' => $this->prepareFileUpload('tests/testpic1.png'),
        ]);

        $this->assertEquals($response->status(), 200);
        $this->assertGreaterThan(0, $gallery->getMedia()->count(), 'gallery should have more than one image');


        $gallery->clearMediaCollection();
    }

    /**
     * @test
     */
    public function an_expedition_gallery_is_automatically_created_when_an_expedition_is_created()
    {
        $expedition = factory(App\Expedition::class)->make();
        $this->asAnAdminUser();
        $this->visit('/admin/expeditions/create')
            ->submitForm('Create Expedition', [
                'name' => $expedition->name,
                'location' => $expedition->location
            ])
            ->seeInDatabase('expeditions', [
                'name' => $expedition->name,
                'location' => $expedition->location
            ]);

        $newExpedition = \App\Expedition::where('name', $expedition->name)->firstOrFail();

        $this->assertGreaterThan(0, $newExpedition->galleries->count(), 'should be at least one gallery');
    }

    /**
     * @test
     */
    public function sponsors_can_be_linked_to_an_expedition()
    {
        $expedition = factory(\App\Expedition::class)->create();

        $sponsor = factory(\App\Sponsor::class)->create(['name' => 'Big Mooz']);
        $sponsor2 = factory(\App\Sponsor::class)->create(['name' => 'Big Carol']);
        $sponsor3 = factory(\App\Sponsor::class)->create(['name' => 'Big Sam']);

        $this->asAnAdminUser();
        $this->visit('/admin/expeditions/'.$expedition->id.'/sponsors')
            ->submitForm('Set Sponsors', [
                'expedition_sponsors[1]' => 1,
                'expedition_sponsors[3]' => 3
            ]);

        $this->assertEquals(2, $expedition->sponsors->count(), 'should be two assosiated sponsors');
        $this->assertTrue($expedition->isSponsoredBy($sponsor));
        $this->assertTrue($expedition->isSponsoredBy($sponsor3));
        $this->assertFalse($expedition->isSponsoredBy($sponsor2));
    }

    /**
     * @test
     */
    public function an_expedition_can_tell_if_it_has_a_given_sponsor()
    {
        $expedition = factory(\App\Expedition::class)->create();
        $sponsor = factory(\App\Sponsor::class)->create();
        $sponsor2 = factory(\App\Sponsor::class)->create();

        $expedition->syncSponsorsById([$sponsor->id]);

        $this->assertTrue($expedition->isSponsoredBy($sponsor), 'expedition should be sponsored by sponsor');
        $this->assertFalse($expedition->isSponsoredBy($sponsor2), 'expedition should not be sponsored by sponsor 2');

    }


}