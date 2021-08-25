<?php

namespace App\Repositories\Eloquent;

use App\Models\Complaint;
use App\Repositories\Interfaces\IComplaint;

class ComplaintRepository extends AbstractModelRepository implements IComplaint
{
    public function __construct(Complaint $model)
    {
        parent::__construct($model);
    }
}
