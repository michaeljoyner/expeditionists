<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class TeamMember extends Model implements HasMediaConversions
{
    use HasProfilePicTrait, HasMediaTrait;

    protected $table = 'team_members';

    protected $fillable = [
        'name',
        'title',
        'intro'
    ];
}
