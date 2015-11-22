<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/17/15
 * Time: 8:18 AM
 */

class BlogTest extends TestCase {

    use DatabaseMigrations, TestsImageUploads;


    /**
     * @test
     */
    public function an_article_can_be_written()
    {
        $this->asAnAdminUser();
        $this->visit('/admin/blog/create')
            ->submitForm('Save Article', [
                'title' => 'A new beginning',
                'intro' => 'All my feelings on this',
                'body' => 'There are so many things to talk about. I will start with this...'
            ])->seeInDatabase('articles', [
                'title' => 'A new beginning',
                'intro' => 'All my feelings on this',
                'body' => 'There are so many things to talk about. I will start with this...'
            ]);
    }

    /**
     * @test
     */
    public function an_article_can_be_updated()
    {
        $article = factory(\App\Blog\Article::class)->create();
        $this->asAnAdminUser();

        $this->visit('/admin/blog/'.$article->id.'/edit')
            ->type('A little red foo foo', 'intro')
            ->press('Save Changes')
            ->seeInDatabase('articles', [
                'id' => $article->id,
                'intro' => 'A little red foo foo'
            ]);
    }

    /**
     * @test
     */
    public function an_articles_published_state_can_be_toggled()
    {
        $this->withoutMiddleware();
        $this->asAnAdminUser();
        $article = factory(\App\Blog\Article::class)->create();

        $initialState = $article->published;
        $response = $this->call('POST', '/admin/blog/'.$article->id.'/publish');
        $finalState = \App\Blog\Article::findOrFail($article->id)->published;

        $this->assertEquals(200, $response->status());
        $this->assertNotEquals($initialState, $finalState, 'articles published state should have changed');
    }

    /**
     * @test
     */
    public function it_paginates_articles_in_the_admin_index()
    {
        $this->asAnAdminUser();
        foreach(range(1,20) as $index) {
            factory(\App\Blog\Article::class)->create(['title' => 'Post '.$index, 'published_on' => \Carbon\Carbon::now()->subDays(30 - $index)->toDateString()]);
        }
        $this->visit('/admin/blog')
            ->dontSee('Post 5')
            ->click('2')
            ->see('Post 5');
    }

    /**
     * @test
     */
    public function an_article_can_be_deleted()
    {
        $this->withoutMiddleware();
        $this->asAnAdminUser();

        $article = factory(\App\Blog\Article::class)->create();

        $this->call('DELETE', '/admin/blog/'.$article->id);

        $this->notSeeInDatabase('articles', [
            'id' => $article->id
        ]);
    }

    /**
     * @test
     */
    public function a_user_can_only_edit_delete_or_publish_their_own_articles_unless_they_are_an_admin_user()
    {
        $adminUser = $this->makeAdminUser();
        $article = factory(\App\Blog\Article::class)->create([
            'profile_id' => $adminUser->profile->id,
            'title' => 'Someone elses Post'
        ]);

        $newUser = factory(\App\User::class)->create();
        $profile = factory(\App\Profile::class)->create(['user_id' => $newUser->id]);

        $this->actingAs($newUser)
            ->visit('/admin/blog')
            ->see('Someone elses Post')
            ->dontSee('article-actions');
    }

    /**
     * @test
     */
    public function an_articles_published_on_date_is_set_on_its_first_publish()
    {
        $this->withoutMiddleware();
        $this->asAnAdminUser();

        $article = factory(\App\Blog\Article::class)->create();
        $this->assertNull($article->published_on);

        $response = $this->call('POST', '/admin/blog/'.$article->id.'/publish');
        $this->assertEquals(200, $response->status());

        $article = \App\Blog\Article::findOrFail($article->id);
        $this->assertTrue(\Carbon\Carbon::now()->isSameDay($article->published_on));

        $nextResponse = $this->call('POST', '/admin/blog/'.$article->id.'/publish');
        $this->assertEquals(200, $nextResponse->status());

        $article = \App\Blog\Article::findOrFail($article->id);
        $this->assertNotNull($article->published_on);
    }

    /**
     * @test
     */
    public function an_article_can_have_an_image_assosiated_to_it()
    {
        $this->withoutMiddleware();
        $this->asAnAdminUser();

        $article = factory(\App\Blog\Article::class)->create();

        $response = $this->call('POST', '/admin/uploads/blog/'.$article->id.'/image', [], [], [
            'file' => $this->prepareFileUpload(realpath('tests/testpic1.png'))
        ]);
        $this->assertEquals(200, $response->status());

        $article = \App\Blog\Article::findOrFail($article->id);
        $this->assertContains('/media', $article->coverPic(), 'has a media image');

        $article->clearMediaCollection();
    }

}