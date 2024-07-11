<?php

namespace App\Shared\Infrastructure\Symfony\Authentication;

use App\Shared\Domain\Authentication\AuthenticationService;

class DefaultAuthenticationService implements AuthenticationService
{
    public function verifyPassword(string $plainPassword, string $hashedPassword): bool
    {
        return password_verify($plainPassword, $hashedPassword);
    }
}
