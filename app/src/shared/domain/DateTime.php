<?php

namespace App\shared\domain;

use DateTimeImmutable;

class DateTime
{
    protected function __construct(private DateTimeImmutable $value)
    {
    }

    public static function generate(): static
    {
        return new self(new DateTimeImmutable());
    }

    public static function fromPrimitive(string $value): static
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('Invalid argument type. Expected string.');
        }

        $dateTime = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $value);
        if (!$dateTime) {
            throw new \InvalidArgumentException('Invalid date format.');
        }
        return new self($dateTime);
    }

    public static function of(DateTimeImmutable $value): static
    {
        if (!($value instanceof DateTimeImmutable)) {
            throw new \InvalidArgumentException('Invalid argument type. Expected DateTimeImmutable.');
        }

        return new self($value);
    }

    public function getValue(): DateTimeImmutable
    {
        return $this->value;
    }

    public function equals(DateTime $dateTime): bool
    {
        return $this->value == $dateTime->getValue();
    }
}
