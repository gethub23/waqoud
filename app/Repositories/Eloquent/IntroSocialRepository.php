<?php

namespace App\Repositories\Eloquent;

use App\Models\IntroSocial;
use App\Repositories\Interfaces\IIntroSocial;

class IntroSocialRepository extends AbstractModelRepository implements IIntroSocial
{
    public function __construct(IntroSocial $model)
    {
        parent::__construct($model);
    }
}
