<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/14/15
 * Time: 10:51 AM
 */

class GalleriesTest extends TestCase {

    use DatabaseMigrations;

    /**
     * @test
     */
    public function a_galleries_images_can_be_fetched_as_json()
    {
        $this->asAnAdminUser();
        $profile = factory(\App\Profile::class)->create();
        $gallery = factory(\App\Gallery::class)->create(['galleryable_id' => $profile->id]);

        $gallery->addImage(realpath('tests/testpic1.png'));
        $gallery->addImage(realpath('tests/testpic2.png'));

        $response = $this->call('GET', '/admin/uploads/galleries/'.$gallery->id.'/images');

        $this->assertEquals(200, $response->status(), 'response status should be 200');
        $this->assertContains('testpic1', $response->getContent(), 'testpic1 should be present');
        $this->assertContains('testpic2', $response->getContent(), 'testpic1 should be present');

        $gallery->clearMediaCollection();
    }

    /**
     * @test
     */
    public function a_specific_image_can_be_deleted_from_a_gallery()
    {
        $this->withoutMiddleware();
        $this->asAnAdminUser();
        $profile = factory(\App\Profile::class)->create();
        $gallery = factory(\App\Gallery::class)->create(['galleryable_id' => $profile->id]);

        $image1 = $gallery->addImage(realpath('tests/testpic1.png'));
        $image2 = $gallery->addImage(realpath('tests/testpic2.png'));

        $response = $this->call('DELETE', '/admin/uploads/galleries/'.$gallery->id.'/images/'.$image1->id);

        $this->assertEquals(200, $response->status());
        $this->assertEquals(1, $gallery->getMedia()->count());
        $this->assertContains('testpic2', $gallery->getMedia()[0]->name);

        $gallery->clearMediaCollection();
    }

}