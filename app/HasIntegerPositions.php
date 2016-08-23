<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 8/23/16
 * Time: 10:14 AM
 */

namespace App;


trait HasIntegerPositions
{
    public function scopeOrdered($query)
    {
        return $query->orderBy('position');
    }

    public static function setOrder($positions)
    {
        collect($positions)->each(function($id, $position) {
            $model = static::find($id);
            if($model) {
                $model->position = $position + 1;
                $model->save();
            }
        });
    }
}