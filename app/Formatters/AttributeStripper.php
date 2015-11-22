<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/19/15
 * Time: 9:31 AM
 */

namespace App\Formatters;


use DOMDocument;
use DOMXPath;

class AttributeStripper {

    public static function strip($attribute, $html)
    {
        if(self::isNotHtml($html)) {
            return $html;
        }

        $doc = static::prepareDomDocument($html);

        $domx = new DOMXPath($doc);
        $items = $domx->query("//*[@".$attribute."]");

        foreach($items as $item) {
            $item->removeAttribute($attribute);
        }

        return mb_substr($doc->saveHTML($doc->documentElement->childNodes->item(0)), 6, -7);
    }

    private static function prepareDomDocument($html)
    {
        $domd = new DOMDocument();
        libxml_use_internal_errors(true);
        $domd->loadHTML($html);
        libxml_use_internal_errors(false);
        
        return $domd;
    }

    /**
     * @param $html
     * @return bool
     */
    private static function isNotHtml($html)
    {
        return !preg_match('/<[a-zA-Z]+.*>/', $html);
    }

}