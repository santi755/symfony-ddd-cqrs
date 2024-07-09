<?php

namespace App\Auth\Application;

use App\Auth\Domain\User;

class LoginUser
{
    public function __construct(private User $user)
    {
    }

    public function execute(): void
    {
        echo 'Logging in user';
    }
}
