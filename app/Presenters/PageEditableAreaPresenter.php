<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/21/15
 * Time: 4:42 PM
 */

namespace App\Presenters;


use App\Presenters\Exceptions\PresenterException;

class PageEditableAreaPresenter extends Presenter {

    public function area($areaName){
        $area = $this->entity->editableAreas->where('name', $areaName)->first();

        if(! $area) {
            throw new PresenterException('editable area not found');
        }

        return $area->content;
    }

}