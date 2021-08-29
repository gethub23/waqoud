<?php

namespace App\Repositories\Eloquent;

use App\Models\StationDue;
use App\Repositories\Interfaces\IStationDue;

class StationDueRepository extends AbstractModelRepository implements IStationDue
{
    public function __construct(StationDue $model)
    {
        parent::__construct($model);
    }
}
