<?php

namespace App\Repositories\Eloquent;

use App\Models\Station;
use App\Repositories\Interfaces\IStation;

class StationRepository extends AbstractModelRepository implements IStation
{
    public function __construct(Station $model)
    {
        parent::__construct($model);
    }
}
