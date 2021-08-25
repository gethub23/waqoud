<?php

namespace App\Repositories\Eloquent;

use App\Models\Image;
use App\Repositories\Interfaces\IImage;

class ImageRepository extends AbstractModelRepository implements IImage
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }
}
