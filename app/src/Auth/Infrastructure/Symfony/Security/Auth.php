<?php

namespace App\Auth\Infrastructure\Symfony\Security;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

// https://symfony.com/doc/current/security.html#registering-the-user-hashing-passwords
final class Auth implements UserInterface, PasswordAuthenticatedUserInterface
{
    public function __construct(
        private string $email,
        private string $password,
        private array $roles
    ) {}

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        return $this->roles ?? [];
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void {}
}
