<?php

namespace App\Content;

use App\Presenters\PageEditableAreaPresenter;
use App\Presenters\PresentableTrait;
use App\Presenters\Contracts\PresenterInterface;
use Illuminate\Database\Eloquent\Model;

class Page extends Model implements PresenterInterface {

    use PresentableTrait;

    protected $table = 'pages';

    protected $fillable = [
        'name'
    ];

    protected $presenter = PageEditableAreaPresenter::class;

    public function editableAreas()
    {
        return $this->hasMany('App\Content\EditableArea', 'page_id');
    }
}
