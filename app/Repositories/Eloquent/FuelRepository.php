<?php

namespace App\Repositories\Eloquent;

use App\Models\Fuel;
use App\Repositories\Interfaces\IFuel;

class FuelRepository extends AbstractModelRepository implements IFuel
{
    public function __construct(Fuel $model)
    {
        parent::__construct($model);
    }
}
