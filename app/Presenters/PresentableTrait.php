<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/21/15
 * Time: 4:40 PM
 */

namespace App\Presenters;


use App\Presenters\Exceptions\PresenterException;

trait PresentableTrait {

    protected $presenterInstance;

    public function present()
    {
        if ( ! $this->presenter || ! class_exists($this->presenter))
        {
            throw new PresenterException('Please set the protected $presenter property on this class');
        }
        if ( ! $this->presenterInstance)
        {
            $this->presenterInstance = new $this->presenter($this);
        }
        return $this->presenterInstance;
    }
}