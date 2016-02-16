<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 2/16/16
 * Time: 10:03 AM
 */

namespace App;


trait HasProfilePicTrait
{
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 200, 'h' => 200, 'fit' => 'crop', 'crop-mode' => 'top'])
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
}