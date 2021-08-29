<?php

namespace App\Repositories\Eloquent;

use App\Models\StationWallet;
use App\Repositories\Interfaces\IStationWallet;

class StationWalletRepository extends AbstractModelRepository implements IStationWallet
{
    public function __construct(StationWallet $model)
    {
        parent::__construct($model);
    }
}
