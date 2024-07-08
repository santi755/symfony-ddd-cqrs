<?php

namespace App\auth\domain;

use App\shared\domain\Uuid;

class UserUuid extends Uuid
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}
