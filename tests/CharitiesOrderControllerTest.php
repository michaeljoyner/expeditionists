<?php
use App\Charity;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 8/23/16
 * Time: 10:28 AM
 */
class CharitiesOrderControllerTest extends TestCase
{
    use DatabaseMigrations;
    
    /**
     *@test
     */
    public function charities_can_be_ordered_by_posting_to_an_endpoint()
    {
        factory(Charity::class)->create(['name' => 'second', 'id' => 1]);
        factory(Charity::class)->create(['name' => 'first', 'id' => 2]);
        factory(Charity::class)->create(['name' => 'fourth', 'id' => 3]);
        factory(Charity::class)->create(['name' => 'third', 'id' => 4]);

        $this->asAnAdminUser();
        $this->withoutMiddleware();

        $response = $this->call('POST', '/admin/charities/order', [
            'order' => [2,1,4,3]
        ]);
        $this->assertEquals(200, $response->status());

        $ordered = Charity::ordered()->get();

        $this->assertEquals('first', $ordered->first()->name);
        $this->assertEquals('second', $ordered[1]->name);
        $this->assertEquals('third', $ordered[2]->name);
        $this->assertEquals('fourth', $ordered->last()->name);
    }
}