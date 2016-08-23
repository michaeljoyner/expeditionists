<?php
use App\Sponsor;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 8/23/16
 * Time: 10:18 AM
 */
class SponsorsOrderControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     *@test
     */
    public function sponsors_can_have_their_order_set_by_posting_to_endpoint()
    {
        factory(Sponsor::class)->create(['name' => 'second', 'id' => 1]);
        factory(Sponsor::class)->create(['name' => 'first', 'id' => 2]);
        factory(Sponsor::class)->create(['name' => 'fourth', 'id' => 3]);
        factory(Sponsor::class)->create(['name' => 'third', 'id' => 4]);

        $this->asAnAdminUser();
        $this->withoutMiddleware();

        $response = $this->call('POST', '/admin/sponsors/order', [
            'order' => [2,1,4,3]
        ]);
        $this->assertEquals(200, $response->status());

        $ordered = Sponsor::ordered()->get();

        $this->assertEquals('first', $ordered->first()->name);
        $this->assertEquals('second', $ordered[1]->name);
        $this->assertEquals('third', $ordered[2]->name);
        $this->assertEquals('fourth', $ordered->last()->name);
    }
}