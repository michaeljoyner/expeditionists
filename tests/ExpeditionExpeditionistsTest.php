<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/16/15
 * Time: 8:21 AM
 */

class ExpeditionExpeditionistsTest extends  TestCase {

    use DatabaseMigrations;

    /**
     * @test
     */
    public function profiles_can_be_linked_to_expeditions()
    {
        $expedition = factory(\App\Expedition::class)->create();
        $profile1 = factory(\App\Profile::class)->create();
        $profile2 = factory(\App\Profile::class)->create();
        $profile3 = factory(\App\Profile::class)->create();

        $this->asAnAdminUser();
        $this->visit('/admin/expeditions/'.$expedition->id.'/team')
            ->submitForm('Set Team', [
                'team_member[1]' => 1,
                'team_member[3]' => 3
            ]);

        $this->assertEquals(2, $expedition->expeditionists->count(), 'should be 2 expeditionists on expedition');
        $this->assertTrue($expedition->hasTeamMember($profile1));
        $this->assertTrue($expedition->hasTeamMember($profile3));
        $this->assertFalse($expedition->hasTeamMember($profile2));

    }

}