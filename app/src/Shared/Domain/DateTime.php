<?php

namespace App\Shared\Domain;

use DateTimeImmutable;

class DateTime
{
    protected function __construct(private ?DateTimeImmutable $value)
    {
    }

    public static function generate(): static
    {
        return new static(new DateTimeImmutable());
    }

    public static function fromPrimitive(string $value): static
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('Invalid argument type. Expected string.'); // TODO: Create a custom exception
        }

        $dateTime = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $value);
        if (!$dateTime) {
            throw new \InvalidArgumentException('Invalid date format.'); // TODO: Create a custom exception
        }
        return new static($dateTime);
    }

    public static function of(DateTimeImmutable $value): static
    {
        if (!($value instanceof DateTimeImmutable)) {
            throw new \InvalidArgumentException('Invalid argument type. Expected DateTimeImmutable.'); // TODO: Create a custom exception
        }

        return new static($value);
    }

    public function getValue(): DateTimeImmutable
    {
        return $this->value;
    }

    public function equals(DateTime $dateTime): bool
    {
        return $this->value == $dateTime->getValue();
    }

    public function __toString(): string
    {
        return $this->value->format('Y-m-d H:i:s');
    }
}
