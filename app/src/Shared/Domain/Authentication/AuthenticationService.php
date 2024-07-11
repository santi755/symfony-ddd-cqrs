<?php

namespace App\Shared\Domain\Authentication;

interface AuthenticationService
{
    public function verifyPassword(string $plainPassword, string $hashedPassword): bool;
}
