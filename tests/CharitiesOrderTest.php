<?php
use App\Charity;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 8/23/16
 * Time: 10:11 AM
 */
class CharitiesOrderTest extends TestCase
{
    use DatabaseMigrations;

    /**
     *@test
     */
    public function charities_can_be_retrieved_in_order()
    {
        factory(Charity::class)->create(['name' => 'second', 'position' => 2]);
        factory(Charity::class)->create(['name' => 'first', 'position' => 1]);
        factory(Charity::class)->create(['name' => 'fourth', 'position' => 4]);
        factory(Charity::class)->create(['name' => 'third', 'position' => 3]);

        $ordered = Charity::ordered()->get();

        $this->assertEquals('first', $ordered->first()->name);
        $this->assertEquals('second', $ordered[1]->name);
        $this->assertEquals('third', $ordered[2]->name);
        $this->assertEquals('fourth', $ordered->last()->name);
    }

    /**
     *@test
     */
    public function charities_can_be_ordered_by_passing_an_ordered_list_of_ids()
    {
        factory(Charity::class)->create(['name' => 'second', 'id' => 1]);
        factory(Charity::class)->create(['name' => 'first', 'id' => 2]);
        factory(Charity::class)->create(['name' => 'fourth', 'id' => 3]);
        factory(Charity::class)->create(['name' => 'third', 'id' => 4]);

        Charity::setOrder([2,1,4,3]);

        $ordered = Charity::ordered()->get();

        $this->assertEquals('first', $ordered->first()->name);
        $this->assertEquals('second', $ordered[1]->name);
        $this->assertEquals('third', $ordered[2]->name);
        $this->assertEquals('fourth', $ordered->last()->name);
    }
}