<?php

namespace App\Content;

use App\Formatters\AttributeStripper;
use Illuminate\Database\Eloquent\Model;

class EditableArea extends Model
{
    protected $table = 'editable_areas';

    protected $fillable = [
        'name',
        'allows_html',
        'content'
    ];

    public function page()
    {
        return $this->belongsTo('App\Content\Page', 'page_id');
    }

    public function setContentAttribute($text)
    {
        if($this->attributes['allows_html'] == 0) {
            $this->attributes['content'] = strip_tags($text);
            return;
        }

        $this->attributes['content'] = AttributeStripper::strip('style', $text);

    }
}
