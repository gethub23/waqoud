<?php

namespace App\Repositories\Eloquent;

use App\Models\Copy;
use App\Repositories\Interfaces\ICopy;

class CopyRepository extends AbstractModelRepository implements ICopy
{
    public function __construct(Copy $model)
    {
        parent::__construct($model);
    }
}
