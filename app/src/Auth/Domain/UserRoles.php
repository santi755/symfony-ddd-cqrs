<?php

namespace App\Auth\Domain;


class UserRoles
{
    public const ROLE_USER = 'ROLE_USER';
    public const ROLE_ADMIN = 'ROLE_ADMIN';

    private array $value;

    protected function __construct(array $value)
    {
        $this->value = $value;
    }

    public static function generate(array $value): UserRoles
    {
        return new static($value);
    }

    public function getValue(): array
    {
        return $this->value;
    }

    public function equals(UserRoles $userRoles): bool
    {
        return $this->value === $userRoles->getValue();
    }

    public function __toString(): string
    {
        return json_encode($this->value);
    }
}
