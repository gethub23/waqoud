<?php

namespace App\Repositories\Eloquent;

use App\Models\Message;
use App\Repositories\Interfaces\IMessage;

class MessageRepository extends AbstractModelRepository implements IMessage
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }
}
