<?php
use App\Videos\Video;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 6/29/16
 * Time: 8:28 AM
 */
class VideosTest extends TestCase
{
    use DatabaseMigrations, TestsImageUploads;

    /**
     *@test
     */
    public function a_video_can_exist()
    {
        $video = factory(Video::class)->create();

        $this->seeInDatabase('videos', $video->toArray());
    }

    /**
     *@test
     */
    public function a_new_video_can_be_created()
    {
        $this->asAnAdminUser();

        $this->visit('/admin/videos/create')
            ->submitForm('Add Video', [
                'title' => 'Two expeditionists, one cup',
                'description' => 'Just a video, nothing to see',
                'source' => 'youtube.com'
            ])->seeInDatabase('videos', [
                'title' => 'Two expeditionists, one cup',
                'description' => 'Just a video, nothing to see',
                'source' => 'youtube.com'
            ]);
    }

    /**
     *@test
     */
    public function a_videos_info_may_be_edited()
    {
        $this->asAnAdminUser();
        $video = factory(Video::class)->create();

        $this->visit('/admin/videos/' . $video->id . '/edit')
            ->type('A new Title', 'title')
            ->type('An updated description', 'description')
            ->type('vimeo.com?id=updated', 'source')
            ->press('Save Changes')
            ->seeInDatabase('videos', [
                'id' => $video->id,
                'title' => 'A new Title',
                'description' => 'An updated description',
                'source' => 'vimeo.com?id=updated'
            ]);
    }

    /**
     *@test
     */
    public function a_video_can_be_deleted()
    {
        $this->asAnAdminUser();
        $video = factory(Video::class)->create();
        $this->withoutMiddleware();

        $response = $this->call('DELETE', '/admin/videos/' . $video->id);
        $this->assertEquals(302, $response->status());

        $this->notSeeInDatabase('videos', ['id' => $video->id]);
    }

    /**
     *@test
     */
    public function a_poster_image_can_be_uploaded_for_a_video()
    {
        $this->asAnAdminUser();
        $video = factory(Video::class)->create();
        $this->withoutMiddleware();

        $this->assertCount(0, $video->getMedia());

        $response = $this->call('POST', '/admin/videos/' . $video->id . '/poster', [], [], [
            'file' => $this->prepareFileUpload('tests/testpic1.png')
        ]);
        $this->assertEquals(200, $response->status());

        $this->assertCount(1, $video->getMedia());

        $video->clearMediaCollection();
    }

    /**
     *@test
     */
    public function a_video_has_a_default_poster()
    {
        $video = factory(Video::class)->create();

        $this->assertNotNull($video->poster());
    }

    /**
     *@test
     */
    public function a_youtube_link_can_be_parsed_and_converted_to_an_embed_link()
    {
        $video = factory(Video::class)->create(['source' => 'https://youtu.be/V6QpzxJvi-w']);
        $this->assertEquals('https://www.youtube.com/embed/V6QpzxJvi-w', $video->source);

        $video2 = factory(Video::class)->create(['source' => 'https://www.youtube.com/watch?v=RTRQSVnkUe8']);
        $this->assertEquals('https://www.youtube.com/embed/RTRQSVnkUe8', $video2->source);
    }


}