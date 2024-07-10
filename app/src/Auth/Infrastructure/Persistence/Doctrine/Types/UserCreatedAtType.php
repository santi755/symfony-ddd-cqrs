<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Types;

use App\Auth\Domain\UserCreatedAt;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class UserCreatedAtType extends StringType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->getValue();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): UserCreatedAt
    {
        return UserCreatedAt::fromPrimitive($value);
    }
}
