<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/21/15
 * Time: 4:44 PM
 */

namespace App\Presenters;


abstract class Presenter {

    protected $entity;
    /**
     * @param $entity
     */
    function __construct($entity)
    {
        $this->entity = $entity;
    }
    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if(method_exists($this, $property))
        {
            return $this->{$property}();
        }
        return $this->entity->{$property};
    }

}