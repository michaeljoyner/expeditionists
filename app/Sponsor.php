<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Sponsor extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    protected $table = 'sponsors';

    protected $fillable = [
        'name',
        'site_link',
        'description'
    ];

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 200, 'h' => 200, 'fit' => 'crop', 'fm' => 'png'])
            ->performOnCollections('default');
    }

    public function expeditions()
    {
        return $this->belongsToMany('App\Expedition');
    }

    public function thumbImage()
    {
        $pic =  $this->getFirstMediaUrl('default', 'thumb');

        return $pic ? $pic : '/images/assets/user.png';
    }

    public function setImage($file)
    {
        $this->clearMediaCollection();

        return $this->addMedia($file)->preservingOriginal()->toMediaLibrary();
    }
}
