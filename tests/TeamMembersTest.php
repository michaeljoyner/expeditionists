<?php
use App\TeamMember;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 2/16/16
 * Time: 8:56 AM
 */
class TeamMembersTest extends TestCase
{
    use DatabaseMigrations, TestsImageUploads;

    /**
     *@test
     */
    public function a_team_member_can_be_created()
    {
        $this->asAnAdminUser();

        $this->visit('/admin/team/members/create')
            ->submitForm('Add Member', [
                'name' => 'Mooz Joyner',
                'title' => 'Dark Lord',
                'intro' => 'I love puppies and kittens'
            ])->seeInDatabase('team_members', [
                'name' => 'Mooz Joyner',
                'title' => 'Dark Lord',
                'intro' => 'I love puppies and kittens'
            ]);
    }

    /**
     * @test
     */
    public function a_team_member_can_be_updated()
    {
        $member = factory(TeamMember::class)->create();
        $this->asAnAdminUser();

        $this->visit('/admin/team/members/'.$member->id.'/edit')
            ->type('mooz', 'name')
            ->type('pope', 'title')
            ->type('the cream of the crop', 'intro')
            ->press('Save Changes')
            ->seeInDatabase('team_members', [
                'id' => $member->id,
                'name' => 'mooz',
                'title' => 'pope',
                'intro' => 'the cream of the crop'
            ]);
    }

    /**
     *@test
     */
    public function a_team_member_can_be_deleted()
    {
        $member = factory(TeamMember::class)->create();

        $this->withoutMiddleware();
        $this->asAnAdminUser();

        $response = $this->call('DELETE', '/admin/team/members/'.$member->id);
        $this->assertEquals(302, $response->status());

        $this->notSeeInDatabase('team_members', ['id' => $member->id]);
    }

    /**
     *@test
     */
    public function a_profile_pic_can_be_uploaded_for_a_team_member()
    {
        $member = factory(TeamMember::class)->create();

        $this->withoutMiddleware();
        $this->asAnAdminUser();

        $response = $this->call('POST', '/admin/uploads/team/members/'.$member->id.'/profilepic', [], [], [
            'file' => $this->prepareFileUpload('tests/testpic1.png')
        ]);

        $this->assertEquals(200, $response->status());

        $this->assertTrue($member->hasProfilePic());
    }
}