<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/7/15
 * Time: 10:39 AM
 */

namespace App\Mailing;

use Illuminate\Contracts\Mail\Mailer as LaravelMailer;

abstract class AbstractMailer
{

    /**
     * @var LaravelMailer
     */
    private $mailer;

    public function __construct(LaravelMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    protected function sendTo($to, $from, $subject, $view, $data, $attachments = [])
    {
        $this->mailer->send($view, $data, function($message) use ($to, $from, $subject, $attachments)
        {
            $message->to($to)->subject($subject);
            foreach($attachments as $filename)
            {
                $message->attach($filename);
            }
            if($from !== '')
            {
                $message->from($from);
            }
        });
    }
}