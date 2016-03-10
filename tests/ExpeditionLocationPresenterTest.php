<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/8/16
 * Time: 1:36 PM
 */
class ExpeditionLocationPresenterTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function the_presenter_can_present_locations_as_json_objects_for_ammap_map_image_object()
    {
        $expedition = factory(\App\Expedition::class)->create();
        $locations = factory(\App\MapLocation::class, 5)->create(['expedition_id' => $expedition->id]);
        $locationShouldContain = [
            "color"              => "#FFFFFF",
            "width"              => 19.5,
            "height"             => 27.5,
            "labelColor"         => "#ffffff",
            "labelRollOverColor" => "#85cebf",
            "labelShiftY"        => 0,
            "zoomLevel"          => 4,
        ];

        $presenter = new \App\ExpeditionLocationPresenter();

        $json = $presenter->jsonLocationsForExpedition($expedition);

        $this->assertCount(5, json_decode($json, true));
        $this->assertArraySubset($locationShouldContain, json_decode($json, true)[0]);
        foreach($locations as $location) {
            $this->assertContains('"label":"'.$location->title, $json);
            $this->assertContains('"longitude":"'.$location->longitude, $json);
            $this->assertContains('"latitude":"'.$location->latitude, $json);
        }
    }

}