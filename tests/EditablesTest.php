<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/10/15
 * Time: 8:21 AM
 */

class EditablesTest extends TestCase {

    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_editable_content_area_is_editable()
    {
        $editable = factory(\App\Content\EditableArea::class)->create();

        $this->asAnAdminUser();
        $this->visit('/admin/content/editable/'.$editable->id.'/edit')
            ->type('This is some thoughtfully edited text', 'content')
            ->press('Save')
            ->seeInDatabase('editable_areas', [
                'id' => $editable->id,
                'content' => 'This is some thoughtfully edited text'
            ]);
    }

    /**
     * @test
     */
    public function only_an_admin_user_may_edit_content()
    {
        $editable = factory(\App\Content\EditableArea::class)->create();

        $this->asLoggedInUser();

        $this->visit('/admin/content/editable/'.$editable->id.'/edit')
            ->type('This is some thoughtfully edited text', 'content');

        try {
            $this->press('Save');
        } catch (Exception $e) {
            $this->assertContains ("Received status code [403]",$e->getMessage());
        }

        $this->notSeeInDatabase('editable_areas', [
            'id' => $editable->id,
            'content' => 'This is some thoughtfully edited text'
        ]);
    }

    /**
     * @test
     */
    public function it_strips_tags_if_editable_areas_allow_html_is_false()
    {
        $this->asAnAdminUser();
        $editable = factory(\App\Content\EditableArea::class)->create(['allows_html' => 0]);
        $editable->content = 'This is <span>some html</span> in text';
        $editable->save();
        $this->seeInDatabase('editable_areas', [
            'id' => $editable->id,
            'content' => 'This is some html in text'
        ]);
    }

    /**
     * @test
     */
    public function it_shows_all_editable_content_for_a_page()
    {
        $this->asAnAdminUser();

        $page = factory(\App\Content\Page::class)->create(['name' => 'home']);
        $editableArea1 = factory(\App\Content\EditableArea::class)->create([
            'name' => 'heading',
            'content' => 'Go get em',
            'page_id' => $page->id
        ]);
        $editableArea2 = factory(\App\Content\EditableArea::class)->create([
            'name' => 'mission',
            'content' => 'To get em all',
            'page_id' => $page->id
        ]);
        $editableArea3 = factory(\App\Content\EditableArea::class)->create([
            'name' => 'spiel',
            'content' => 'We are the best getters of the lot',
            'page_id' => $page->id
        ]);

        $this->visit('admin/content/pages/home')
            ->see($editableArea1->content)
            ->see($editableArea2->content)
            ->see($editableArea3->content)
            ->see('href="/admin/content/editable/'.$editableArea1->id.'/edit"')
            ->see('href="/admin/content/editable/'.$editableArea2->id.'/edit"')
            ->see('href="/admin/content/editable/'.$editableArea2->id.'/edit"');

    }

}