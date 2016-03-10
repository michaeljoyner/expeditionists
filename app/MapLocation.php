<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapLocation extends Model
{
    protected $table = 'map_locations';

    protected $fillable = [
        'longitude',
        'latitude',
        'title'
    ];

    public function expedition()
    {
        return $this->belongsTo(Expedition::class, 'expedition_id');
    }


}
