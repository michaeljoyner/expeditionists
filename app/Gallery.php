<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Gallery extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    protected $table = 'galleries';

    protected $fillable = [
        'name'
    ];

    public function addImage($file)
    {
        return $this->addMedia($file)->preservingOriginal()->toMediaLibrary();
    }

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 300, 'h' => 300, 'fit' => 'crop'])
            ->performOnCollections('default');

        $this->addMediaConversion('web')
            ->setManipulations(['w' => 800, 'h' => 800])
            ->performOnCollections('default');
    }

    public function setOrder($orderedIds)
    {
        $media = $this->getMedia();
        if (count($orderedIds) !== $media->count()) {
            throw new \Exception('incorrect amount of ids given');
        }

        for ($i = 0; $i < count($orderedIds); $i++) {
            $image = $media->where('id', intval($orderedIds[$i]))->first();
            if ($image) {
                $image->setCustomProperty('position', $i + 1);
                $image->save();
            }
        }
    }

    public function getOrdered()
    {
        $media = $this->getMedia();

        return $media->sort(function ($a, $b) {
            if ($a->getCustomProperty('position', -1) === $b->getCustomProperty('position', -1)) {
                return 0;
            }

            return $a->getCustomProperty('position', -1) < $b->getCustomProperty('position', -1) ? -1 : 1;
        })->values();
    }
}
