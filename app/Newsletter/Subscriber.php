<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/6/16
 * Time: 3:26 PM
 */

namespace App\Newsletter;


use Illuminate\Support\Facades\Log;
use Spatie\Newsletter\Exceptions\AlreadySubscribed;
use Spatie\Newsletter\MailChimp\Newsletter;

class Subscriber
{

    /**
     * @var Newsletter
     */
    private $newsletter;

    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function subscribe($address)
    {
        $email = $address;
        $success = true;
        $message = '';
        try {
            $result = $this->newsletter->subscribe($address);
            $email = $result['email'];
            $message = 'Thank you!';
        } catch (AlreadySubscribed $alreadySubscibed) {
            $success = false;
            $message = 'You are already subscribed';
        } catch (\Exception $e) {
            $success = false;
            $message = 'Ooops! An error occurred';
            Log::info($e->getMessage());
        } finally {
            return [
                'email'   => $email,
                'success' => $success,
                'message' => $message
            ];
        }
    }

}