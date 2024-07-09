<?php

namespace App\shared\domain;

class Email
{
    private string $value;

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public static function fromPrimitive(string $emailString): Email
    {
        return new Email($emailString);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private function validate(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email address: $value");
        }
    }

    public function equals(Email $other): bool
    {
        return $this->value === $other->value;
    }
}
