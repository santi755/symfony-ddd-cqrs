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
        return new Password($value);
    }

    public static function of(string $value): Password
    {
        return new Password($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(Password $password): bool
    {
        return $this->value === $password->getValue();
    }
}
