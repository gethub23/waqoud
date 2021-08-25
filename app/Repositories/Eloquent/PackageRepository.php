<?php

namespace App\Repositories\Eloquent;

use App\Models\Package;
use App\Repositories\Interfaces\IPackage;

class PackageRepository extends AbstractModelRepository implements IPackage
{
    public function __construct(Package $model)
    {
        parent::__construct($model);
    }
}
