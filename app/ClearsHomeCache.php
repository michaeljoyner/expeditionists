<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 8/23/16
 * Time: 2:09 PM
 */

namespace App;


use Illuminate\Support\Facades\Cache;

trait ClearsHomeCache
{
    public static function boot()
    {
        parent::boot();

        static::saved(function() {
            Cache::forget(static::HOME_CACHE_KEY);

            return true;
        });
    }
}