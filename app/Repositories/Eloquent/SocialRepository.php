<?php

namespace App\Repositories\Eloquent;

use App\Models\Social;
use App\Repositories\Interfaces\ISocial;

class SocialRepository extends AbstractModelRepository implements ISocial
{
    public function __construct(Social $model)
    {
        parent::__construct($model);
    }
}
