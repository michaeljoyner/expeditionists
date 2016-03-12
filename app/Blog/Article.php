<?php

namespace App\Blog;

use App\Formatters\AttributeStripper;
use App\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Article extends Model implements SluggableInterface, HasMediaConversions
{
    use SluggableTrait, HasMediaTrait;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'intro',
        'body',
        'published_on',
        'published'
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $dates = [
        'published_on',
        'created_at',
        'updated_at'
    ];

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 400, 'h' => 300])
            ->performOnCollections('default');
    }

    public function author()
    {
        return $this->belongsTo('App\Profile', 'profile_id');
    }

    public static function createForUser(User $user, array $input)
    {
        return $user->profile->articles()->create($input);
    }

    public function togglePublishedStatus()
    {
        if(! $this->attributes['published_on']) {
            $this->published_on = Carbon::now()->toDateString();
        }
        $this->published = ! $this->attributes['published'];
        $this->save();

        return $this->published;
    }

    public function setCoverImage($file)
    {
        $this->clearMediaCollection();
        return $this->addMedia($file)->preservingOriginal()->toMediaLibrary();
    }

    public function coverPic()
    {
        $pic = $this->getMedia();

        return ! $pic->isEmpty() ? $pic[0]->getUrl() : null;
    }

    public function hasCoverPic()
    {
        return ! $this->getMedia()->isEmpty();
    }

    public function setBodyAttribute($body)
    {
        $this->attributes['body'] = AttributeStripper::strip('style', $body);
    }
}
