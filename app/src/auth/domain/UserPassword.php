<?php

namespace App\auth\domain;

use App\shared\domain\Password;

class UserPassword
{
    public function __construct(private Password $value)
    {
    }

    public static function fromPrimitive(string $passwordString): UserPassword
    {
        $password = Password::fromPrimitive($passwordString);
        return new UserPassword($password);
    }
}
