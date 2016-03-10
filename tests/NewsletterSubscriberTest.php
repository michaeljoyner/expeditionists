<?php
use App\Newsletter\Subscriber;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/6/16
 * Time: 3:28 PM
 */
class NewsletterSubscriberTest extends TestCase
{

    /**
     * @test
     */
    public function it_subscribes_an_email_to_the_newsletter_list()
    {
        $mailchimp = Mockery::mock(Spatie\Newsletter\MailChimp\Newsletter::class);
        $mailchimp->shouldReceive('subscribe')->with('joe@example.com')->once()->andReturn(['email' => 'joe@example.com']);

        $subscriber = new Subscriber($mailchimp);
        $result = $subscriber->subscribe('joe@example.com');

        $this->assertEquals([
            'email' => 'joe@example.com',
            'success' => true,
            'message' => 'Thank you!'
        ], $result);
    }

    /**
     *@test
     */
    public function it_returns_the_appropriate_info_if_subscription_fails()
    {
        $mailchimp = Mockery::mock(Spatie\Newsletter\MailChimp\Newsletter::class);
        $mailchimp->shouldReceive('subscribe')->andThrow(\Spatie\Newsletter\Exceptions\AlreadySubscribed::class, '');

        $subscriber = new Subscriber($mailchimp);
        $result = $subscriber->subscribe('joe@example.com');

        $this->assertEquals([
            'email' => 'joe@example.com',
            'success' => false,
            'message' => 'You are already subscribed'
        ], $result);
    }

}