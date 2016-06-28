<?php

namespace App\Events;

use App\Events\Event;
use App\Http\Requests\VolunteerApplicationFormRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class VolunteerFormWasSubmitted extends Event
{
    use SerializesModels;

    public $application_type;
    public $title;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $country;
    public $project;

    /**
     * Create a new event instance.
     *
     * @param VolunteerApplicationFormRequest $request
     */
    public function __construct(VolunteerApplicationFormRequest $request)
    {
        $this->name = $request->get('name', 'not supplied');
        $this->title = $request->get('title', 'not supplied');
        $this->email = $request->get('email', 'not supplied');
        $this->phone = $request->get('phone', 'not supplied');
        $this->address = $request->get('address', 'not supplied');
        $this->country = $request->get('country', 'not supplied');
        $this->date_of_birth = $request->get('date_of_birth', 'not supplied');
        $this->city = $request->get('city', 'not supplied');
        $this->project = $request->get('project', 'not supplied');
        $this->application_type = $request->get('application_type', 'not supplied');
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
