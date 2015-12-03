<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Profile extends Model implements HasMediaConversions, SluggableInterface
{
    use HasMediaTrait, SluggableTrait;

    protected $table = 'profiles';

    protected $dates = [
        'created_at',
        'updated_at',
        'date_of_birth'
    ];

    protected $fillable = [
        'name',
        'email',
        'intro',
        'date_of_birth',
        'nationality',
        'residence',
        'athletic_skills',
        'hero_status',
        'hero_statement',
        'biography',
        'facebook',
        'twitter',
        'instagram',
        'linkedin'
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    public static function scopeCompleted($query)
    {
        return $query->where('name', '!=', 'unknown')
            ->orWhere('name', '!=', '')
            ->orwhere('intro', '!=', '')
            ->whereNotNull('intro');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function expeditions()
    {
        return $this->belongsToMany('App\Expedition');
    }

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 200, 'h' => 200, 'fit' => 'crop'])
            ->performOnCollections('default');

        $this->addMediaConversion('web')
            ->setManipulations(['w' => 400, 'h' => 600])
            ->performOnCollections('default');
    }

    public function setProfilePic($file, $name = false)
    {
        $this->clearMediaCollection();
        if($name) {
            $this->addMedia($file)->preservingOriginal()->usingFileName($name)->toMediaLibrary();
            return;
        }
        $this->addMedia($file)->preservingOriginal()->toMediaLibrary();
    }

    public function hasProfilePic()
    {
        return $this->getMedia()->count() > 0;
    }

    public function profilePic($thumb = true)
    {

        $pic =  $this->getFirstMediaUrl('default', $thumb ? 'thumb' : 'web');

        return $pic ? $pic : '/images/assets/user.png';
    }

    public function galleries()
    {
        return $this->morphMany('App\Gallery', 'galleryable');
    }

    public function addGallery($name)
    {
        $this->galleries()->create(['name' => $name]);
    }

    public function articles()
    {
        return $this->hasMany('App\Blog\Article', 'profile_id');
    }
}
