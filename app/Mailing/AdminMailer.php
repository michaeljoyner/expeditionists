<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/7/15
 * Time: 10:42 AM
 */

namespace App\Mailing;


class AdminMailer extends AbstractMailer
{
    protected $to = ['joyner.michael@gmail.com' => 'Michael Joyner'];

    public function sendContactMessage(array $contact_message)
    {
        $from = $contact_message['email'];
        $subject = 'Expeditionists.org Site Message';
        $data = compact('contact_message');
        $view = 'emails.contact';
        $this->sendTo($this->to, $from, $subject, $view, $data);
    }

    public function notifyNewUser($data)
    {
        $from = [$data['creator_email'] => $data['creator_name']];
        $subject = 'You have been registered on Expeditionists';
        $to = $data['new_user_email'];
        $view = 'emails.registered';
        $data = compact('data');
        $this->sendTo($to, $from, $subject, $view, $data);
    }

    public function notifyOfApplicationFormSubmission($applicationData)
    {
        $from = [$applicationData->email => $applicationData->name];
        $subject = $applicationData->application_type . ' application';
        $view = 'emails.application';
        $data = ['applicant' => $applicationData];

        $this->sendTo($this->to, $from, $subject, $view, $data);
    }

}