<?php

namespace App\Auth\Application\Command;

class RegisterUserCommand
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password
    ) {
    }
}
