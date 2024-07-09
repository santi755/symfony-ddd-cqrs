<?php

namespace App\auth\domain;

use App\shared\domain\DateTime;

class UserDateTime
{
    public function __construct(private DateTime $value)
    {
    }

    public static function generate(): static
    {
        $datetime = DateTime::generate();

        return new UserDateTime($datetime);
    }

    public static function fromPrimitive(string $value): static
    {
        $datetime = DateTime::fromPrimitive($value);

        return new UserDateTime($datetime);
    }

    public static function of(string $value): static
    {
        $datetime = DateTime::fromPrimitive($value);

        return new UserDateTime($datetime);
    }
}
