<?php

namespace App\Repositories\Eloquent;

use App\Models\IntroService;
use App\Repositories\Interfaces\IIntroService;

class IntroServiceRepository extends AbstractModelRepository implements IIntroService
{
    public function __construct(IntroService $model)
    {
        parent::__construct($model);
    }
}
