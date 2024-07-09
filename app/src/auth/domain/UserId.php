<?php

namespace App\auth\domain;

use App\shared\domain\Uuid;

class UserId
{
    public function __construct(private Uuid $value)
    {
    }

    public static function generate(): UserId
    {
        $uuid = Uuid::generate();

        return new UserId($uuid);
    }
}
