<?php

namespace App\Repositories\Eloquent;

use App\Models\IntroMessages;
use App\Repositories\Interfaces\IIntroMessages;

class IntroMessagesRepository extends AbstractModelRepository implements IIntroMessages
{
    public function __construct(IntroMessages $model)
    {
        parent::__construct($model);
    }
}
