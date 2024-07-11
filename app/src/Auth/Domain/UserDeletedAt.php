<?php

namespace App\Auth\Domain;

use App\Shared\Domain\DateTime;

use DateTimeImmutable;

class UserDeletedAt extends DateTime
{
    public static function fromPrimitive(?string $value): static
    {
        if (null === $value) {
            return new static(null);
        }

        if (!is_string($value)) {
            throw new \InvalidArgumentException('Invalid argument type. Expected string.'); // TODO: Create a custom exception
        }

        $dateTime = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $value);
        if (!$dateTime) {
            throw new \InvalidArgumentException('Invalid date format.'); // TODO: Create a custom exception
        }
        return new static($dateTime);
    }
}
