<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Profile extends Model implements HasMediaConversions, SluggableInterface
{
    use HasMediaTrait, SluggableTrait, HasProfilePicTrait, ClearsHomeCache;

    const HOME_CACHE_KEY = 'home:profiles';

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

    public function dateForForm()
    {
        if(array_key_exists('date_of_birth', $this->attributes)) {
            return $this->attributes['date_of_birth'];
        }

        return null;
    }

    public static function scopeCompleted($query)
    {
        return $query->where('intro', '!=', '')
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
