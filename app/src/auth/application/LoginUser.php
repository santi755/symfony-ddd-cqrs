<?php

namespace App\auth\application;

use App\auth\domain\User;

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
