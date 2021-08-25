<?php

namespace App\Repositories\Eloquent;

use App\Models\IntroSlider;
use App\Repositories\Interfaces\IIntroSlider;

class IntroSliderRepository extends AbstractModelRepository implements IIntroSlider
{
    public function __construct(IntroSlider $model)
    {
        parent::__construct($model);
    }
}
