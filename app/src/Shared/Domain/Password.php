<?php

namespace App\Shared\Domain;

use Ramsey\Uuid\Uuid as RamseyUuid;

class Password
{
    private string $value;

    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromPrimitive(string $value): Password
    {
        if (strlen($value) < 8) {
            throw new \InvalidArgumentException('Password must be at least 8 characters long');
        }

        return new static(password_hash($value, PASSWORD_BCRYPT));
    }

    public static function of(string $value): Password
    {
        return new static($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(Password $password): bool
    {
        return $this->value === $password->getValue();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
