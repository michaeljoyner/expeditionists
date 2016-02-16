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

    /**
     *@test
     */
    public function the_ordering_of_the_team_members_can_be_set_by_posting_array_of_ids_in_req_order()
    {
        $members = factory(TeamMember::class, 5)->create();

        $this->withoutMiddleware();
        $this->asAnAdminUser();

        $response = $this->call('POST', '/admin/team/order', [
            'order' => [3,2,5,1,4]
        ]);

        $this->assertEquals(200, $response->status());

        $members = TeamMember::ordered()->get();
        $this->assertEquals(3, $members->first()->id);
        $this->assertEquals(4, $members->last()->id);
        $this->assertEquals(2, $members[1]->id);
        $this->assertEquals(5, $members[2]->id);
    }
}