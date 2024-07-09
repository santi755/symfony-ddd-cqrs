<?php

namespace App\Shared\Domain;

use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    protected function __construct(private string $value)
    {
    }

    public static function generate(): Uuid
    {
        return new Uuid(RamseyUuid::uuid4()->toString());
    }

    public static function fromPrimitive(string $value): static
    {
        if (!is_string($value) || !RamseyUuid::isValid($value)) {
            throw new \InvalidArgumentException('Invalid UUID');
        }

        return new Uuid($value);
    }

    public static function of(string $value): static
    {
        return new Uuid($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(Uuid $uuid): bool
    {
        return $this->value === $uuid->getValue();
    }
}
