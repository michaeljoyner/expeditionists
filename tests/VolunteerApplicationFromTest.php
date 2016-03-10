<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/6/16
 * Time: 12:04 PM
 */
class VolunteerApplicationFromTest extends TestCase
{

    use DatabaseMigrations;

    /**
     *@test
     */
    public function a_valid_application_form_raises_a_form_submitted_event_with_the_correct_payload()
    {
        $this->expectsEvents(App\Events\VolunteerFormWasSubmitted::class);

        $this->visit('/getinvolved')
            ->submitForm('Apply', [
                'application_type' => 'volunteer',
                'title' => 'Mr',
                'name' => 'Mooz Joyner',
                'email' => 'joe@example.com',
                'phone' => '0123456789',
                'address' => '123 Sesame street',
                'city' => 'Boston',
                'country' => 'France',
                'date_of_birth' => '1990-01-01',
                'project' => 'Morphius'
            ]);
    }

}