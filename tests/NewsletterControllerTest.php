<?php

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/6/16
 * Time: 3:50 PM
 */
class NewsletterControllerTest extends TestCase
{

    /**
     *@test
     */
    public function an_email_can_be_subscribed_by_posting_to_an_api_endpoint()
    {
        $this->withoutMiddleware();

        $response = $this->call('POST', '/newsletter/subscribe', ['email' => 'joe@example.com']);
        $this->assertEquals(200, $response->status());

        $this->seeJson([
            'email' => 'joe@example.com',
            'success' => true,
            'message' => 'Thank you!'
        ]);
    }

}