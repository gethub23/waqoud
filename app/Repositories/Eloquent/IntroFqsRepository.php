<?php

namespace App\Repositories\Eloquent;

use App\Models\IntroFqs;
use App\Repositories\Interfaces\IIntroFqs;

class IntroFqsRepository extends AbstractModelRepository implements IIntroFqs
{
    public function __construct(IntroFqs $model)
    {
        parent::__construct($model);
    }
}
