<?php

namespace App\Repositories\Eloquent;

use App\Models\Intro;
use App\Repositories\Interfaces\IIntro;

class IntroRepository extends AbstractModelRepository implements IIntro
{
    public function __construct(Intro $model)
    {
        parent::__construct($model);
    }
}
