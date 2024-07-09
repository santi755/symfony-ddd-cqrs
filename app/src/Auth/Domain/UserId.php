<?php

namespace App\Auth\Domain;

use App\Shared\Domain\Uuid;

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
