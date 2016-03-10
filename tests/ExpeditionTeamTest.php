<?php
use App\Expedition;
use App\TeamMember;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/2/16
 * Time: 9:12 AM
 */
class ExpeditionTeamTest extends TestCase
{

    use DatabaseMigrations;

    /**
     *@test
     */
    public function a_team_member_can_be_added_to_an_expedition()
    {
        $member = factory(TeamMember::class)->create();
        $expedition = factory(Expedition::class)->create();

        $expedition->addTeamMember($member);

        $this->assertTrue($expedition->hasTeamMember($member));
    }

    /**
     * @test
     */
    public function a_team_member_can_be_added_to_an_expedition_by_id()
    {
        $member = factory(TeamMember::class)->create();
        $expedition = factory(Expedition::class)->create();

        $expedition->addTeamMember($member->id);

        $this->assertTrue($expedition->hasTeamMember($member));

    }

    /**
     *@test
     */
    public function a_group_of_team_members_can_be_synced_as_an_expeditions_team()
    {
        $member = factory(TeamMember::class)->create();
        $expedition = factory(Expedition::class)->create();
        $expedition->addTeamMember($member->id);
        $this->assertCount(1, $expedition->teamMembers, 'should only have one team member now');

        $newMembers = factory(TeamMember::class, 3)->create();
        $expedition->syncTeamMembers($newMembers->pluck('id')->toArray());

        $expedition = Expedition::findOrFail($expedition->id);

        $this->assertCount(3, $expedition->teamMembers);
        $this->assertFalse($expedition->hasTeamMember($member));
    }

}