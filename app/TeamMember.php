<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class TeamMember extends Model implements HasMediaConversions, Sortable
{
    use HasProfilePicTrait, HasMediaTrait, SortableTrait;

    protected $table = 'team_members';

    protected $fillable = [
        'name',
        'title',
        'intro'
    ];

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];
}
