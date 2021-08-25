<?php

namespace App\Repositories\Eloquent;

use App\Models\IntroPartener;
use App\Repositories\Interfaces\IIntroPartener;

class IntroPartenerRepository extends AbstractModelRepository implements IIntroPartener
{
    public function __construct(IntroPartener $model)
    {
        parent::__construct($model);
    }
}
