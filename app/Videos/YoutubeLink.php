<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 7/4/16
 * Time: 9:09 AM
 */

namespace App\Videos;


class YoutubeLink
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function embeddable()
    {
        return 'https://www.youtube.com/embed/' . $this->extractId();
    }

    protected function extractId()
    {
        $matches = [];
        $containsId = $this->trimToVAttributeValue($this->getFinalUrlPart());

        preg_match('/^([a-zA-Z\-0-9]+)/', $containsId, $matches);

        return $matches[1];
    }

    private function getFinalUrlPart()
    {
        $parts = explode('/', $this->url);
        return array_pop($parts);
    }

    private function trimToVAttributeValue($urlPart)
    {
        if(str_contains($urlPart, 'v=')) {
            return substr($urlPart, strpos($urlPart, 'v=') + 2);
        }

        return $urlPart;
    }
}