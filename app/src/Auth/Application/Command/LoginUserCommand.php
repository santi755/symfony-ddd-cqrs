<?php

namespace App\Auth\Application\Command;

class LoginUserCommand
{
    public function __construct(
        private string $email,
        private string $password
    ) {
    }
}
