<?php
use App\Videos\YoutubeLink;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 7/4/16
 * Time: 9:07 AM
 */
class YoutubeLinksTest extends TestCase
{
    /**
     * @test
     */
    public function a_youtube_link_can_give_its_embeddable_link()
    {
        $testId = 'NLqAFTWOVbY';
        $testUrls = [
            'http://youtu.be/NLqAFTWOVbY',
            'http://www.youtube.com/embed/NLqAFTWOVbY',
            'https://www.youtube.com/embed/NLqAFTWOVbY',
            'http://www.youtube.com/v/NLqAFTWOVbY?fs=1&hl=en_US',
            'http://www.youtube.com/watch?v=NLqAFTWOVbY',
            'http://www.youtube.com/user/Scobleizer#p/u/1/NLqAFTWOVbY',
            'http://www.youtube.com/ytscreeningroom?v=NLqAFTWOVbY',
            'http://www.youtube.com/user/Scobleizer#p/u/1/NLqAFTWOVbY',
            'http://www.youtube.com/watch?v=NLqAFTWOVbY&feature=featured'
        ];

        $link = new YoutubeLink('https://youtu.be/V6QpzxJvi-w');
        $this->assertEquals('https://www.youtube.com/embed/V6QpzxJvi-w', $link->embeddable());

        $link = new YoutubeLink('https://www.youtube.com/watch?v=RTRQSVnkUe8');
        $this->assertEquals('https://www.youtube.com/embed/RTRQSVnkUe8', $link->embeddable());

        foreach ($testUrls as $url) {
            $link = new YoutubeLink($url);
            $this->assertEquals('https://www.youtube.com/embed/'.$testId, $link->embeddable());
        }
    }
}