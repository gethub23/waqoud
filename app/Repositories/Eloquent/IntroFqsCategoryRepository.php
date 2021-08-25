<?php

namespace App\Repositories\Eloquent;

use App\Models\IntroFqsCategory;
use App\Repositories\Interfaces\IIntroFqsCategory;

class IntroFqsCategoryRepository extends AbstractModelRepository implements IIntroFqsCategory
{
    public function __construct(IntroFqsCategory $model)
    {
        parent::__construct($model);
    }
}
