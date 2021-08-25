<?php

namespace App\Repositories\Eloquent;

use App\Models\IntroHowWork;
use App\Repositories\Interfaces\IIntroHowWork;

class IntroHowWorkRepository extends AbstractModelRepository implements IIntroHowWork
{
    public function __construct(IntroHowWork $model)
    {
        parent::__construct($model);
    }
}
