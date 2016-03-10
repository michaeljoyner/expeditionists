<?php

namespace App\Listeners;

use App\Events\VolunteerFormWasSubmitted;
use App\Mailing\AdminMailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifiesAdminOfFormSubmission
{
    /**
     * @var AdminMailer
     */
    private $mailer;

    /**
     * Create the event listener.
     *
     * @param AdminMailer $mailer
     */
    public function __construct(AdminMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  VolunteerFormWasSubmitted  $event
     * @return void
     */
    public function handle(VolunteerFormWasSubmitted $event)
    {
        $this->mailer->notifyOfApplicationFormSubmission($event);
    }
}
