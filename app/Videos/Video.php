<?php

namespace App\Videos;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Video extends Model implements HasMediaConversions, SluggableInterface
{

    use HasMediaTrait, SluggableTrait;
    protected $table = 'videos';

    protected $defaultPoster = '/images/static/NEW_logo_black.png';

    protected $fillable = [
        'title',
        'description',
        'source'
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug'
    ];

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 200, 'h' => 200, 'fit' => 'crop', 'crop-mode' => 'top'])
            ->performOnCollections('default');

        $this->addMediaConversion('poster')
            ->setManipulations(['w' => 600, 'h' => 400, 'fit' => 'crop', 'crop-mode' => 'top'])
            ->performOnCollections('default');
    }

    public function setPoster($file)
    {
        $this->clearMediaCollection();

        return $this->addMedia($file)->preservingOriginal()->toMediaLibrary();
    }

    public function setSourceAttribute($source)
    {
        return $this->attributes['source'] = $this->normaliseSource($source);
    }

    protected function normaliseSource($source)
    {
        $last = collect(explode('/', $source))->last();

        if(str_contains($last, '=')) {
            $matches = [];
            preg_match('/v=([a-zA-Z\-0-9]+)/', $last, $matches);
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        return 'https://www.youtube.com/embed/' . $last;
    }

    public function poster()
    {
        $poster = $this->getMedia()->first();

        return $poster ? $poster->getUrl('poster') : $this->defaultPoster;
    }
}
