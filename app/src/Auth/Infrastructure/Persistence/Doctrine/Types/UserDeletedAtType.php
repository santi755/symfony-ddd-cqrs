<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Types;

use App\Auth\Domain\UserDeletedAt;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class UserDeletedAtType extends StringType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->getValue();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): UserDeletedAt
    {
        return UserDeletedAt::fromPrimitive($value);
    }
}
