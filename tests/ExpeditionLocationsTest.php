<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/8/16
 * Time: 12:07 PM
 */
class ExpeditionLocationsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     *@test
     */
    public function a_location_can_be_added_to_an_expedition()
    {
        $expedition = factory(\App\Expedition::class)->create();
        $locationData = [
            'longitude' => 100,
            'latitude' => 100,
            'title' => 'Marakesh Market',
        ];

        $expedition->addLocation($locationData);

        $this->seeInDatabase('map_locations', [
            'expedition_id' => $expedition->id,
            'longitude' => 100,
            'latitude' => 100,
            'title' => 'Marakesh Market',
        ]);
    }

    /**
     *@test
     */
    public function a_location_can_be_editied()
    {
        $expedition = factory(\App\Expedition::class)->create();
        $location = factory(\App\MapLocation::class)->create(['expedition_id' => $expedition->id]);
        $this->asAnAdminUser();

        $this->visit('/admin/expeditions/'.$expedition->id.'/locations/'.$location->id.'/edit')
            ->type('123', 'longitude')
            ->type('456', 'latitude')
            ->type('mooz was here', 'title')
            ->press('Save Changes')
            ->seeInDatabase('map_locations', [
                'expedition_id' => $expedition->id,
                'longitude' => 123,
                'latitude' => 456,
                'title' => 'mooz was here',
            ]);
    }

    /**
     *@test
     */
    public function a_location_can_be_deleted()
    {
        $expedition = factory(\App\Expedition::class)->create();
        $location = factory(\App\MapLocation::class)->create(['expedition_id' => $expedition->id]);

        $this->asAnAdminUser();
        $this->withoutMiddleware();

        $response = $this->call('DELETE', '/admin/locations/'.$location->id);
        $this->assertEquals(302, $response->status());

        $this->notSeeInDatabase('map_locations', [
            'id' => $location->id
        ]);
    }
}