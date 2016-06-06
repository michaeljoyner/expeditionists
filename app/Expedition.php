<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Expedition extends Model implements HasMediaConversions, SluggableInterface
{
    use HasMediaTrait, SluggableTrait;

    protected $table = 'expeditions';

    protected $fillable = [
        'name',
        'location',
        'about',
        'mission',
        'objectives',
        'donation_goal',
        'donations_to_date',
        'distance',
        'distance_to_date',
        'start_date'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'start_date'
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    public function dateForForm()
    {
        if(array_key_exists('start_date', $this->attributes)) {
            return $this->attributes['start_date'];
        }

        return null;
    }

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 400, 'h' => 300, 'fit' => 'crop'])
            ->performOnCollections('default');

        $this->addMediaConversion('web')
            ->setManipulations(['w' => 500, 'h' => 600])
            ->performOnCollections('default');
    }

    public function expeditionists()
    {
        return $this->belongsToMany('App\Profile');
    }

    public function hasTeamMember($profile)
    {
        if($profile instanceof Profile) {
            return $this->expeditionists->contains($profile);
        }

        return $this->teamMembers->contains($profile);
    }

    public function teamMembers()
    {
        return $this->belongsToMany(TeamMember::class);
    }

    public function addTeamMember($teamMember)
    {
        $id = $teamMember instanceof TeamMember ? $teamMember->id : $teamMember;

        return $this->teamMembers()->attach($id);
    }

    public function syncTeamMembers($ids)
    {
        return $this->teamMembers()->sync($ids);
    }

    public function syncExpeditionistTeamByIds(array $ids)
    {
        return $this->expeditionists()->sync($ids);
    }

    public function sponsors()
    {
        return $this->belongsToMany('App\Sponsor');
    }

    public function syncSponsorsById(array $ids)
    {
        return $this->sponsors()->sync($ids);
    }

    public function isSponsoredBy(Sponsor $sponsor)
    {
        $expeditionSponsors = $this->sponsors;

        return $expeditionSponsors->contains($sponsor);
    }

    public function galleries()
    {
        return $this->morphMany('App\Gallery', 'galleryable');
    }

    public function coverPic($thumb = true)
    {
        $cover =  $this->getFirstMediaUrl('default', $thumb ? 'thumb' : 'web');

        if(! $cover) {
            return asset('images/assets/user.png');
        }

        return $cover;
    }

    public function setCoverPic($file, $name = false)
    {
        $this->clearMediaCollection();
        if($name) {
            $this->addMedia($file)->preservingOriginal()->usingFileName($name)->toMediaLibrary();
            return;
        }
        $this->addMedia($file)->preservingOriginal()->toMediaLibrary();
    }

    public function addGallery($name)
    {
        $this->galleries()->create(['name' => $name]);
    }

    public function locations()
    {
        return $this->hasMany(MapLocation::class, 'expedition_id');
    }

    public function addLocation($attributes)
    {
        return $this->locations()->create($attributes);
    }

    public function charities()
    {
        return $this->belongsToMany(Charity::class);
    }

    public function syncCharitiesById(array $ids)
    {
        $this->charities()->sync($ids);
    }

    public function supportsCharity(Charity $charity)
    {
        return $this->charities->contains($charity);
    }
}
