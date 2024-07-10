<?php

namespace App\Auth\Application;

use App\Auth\Domain\User;

class LoginUser
{
    public function __construct(private User $user)
    {
    }

    public function __invoke(): void
    {
        echo 'Logging in user';
    }
}
