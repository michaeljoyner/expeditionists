<?php

namespace App\Blog;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class ImageGallery extends Model implements HasMediaConversions
{

    use HasMediaTrait;

    public function registerMediaConversions()
    {
        $this->addMediaConversion('web')
            ->setManipulations(['w' => 800, 'h' => 500, 'fit' => 'max'])
            ->performOnCollections('default');
    }

    public static function addImage($image)
    {
        $gallery = static::firstOrCreate([]);

        return $gallery->addMedia($image)->preservingOriginal()->toMediaLibrary();
    }
}
