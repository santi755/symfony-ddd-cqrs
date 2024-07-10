<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Types;

use App\Auth\Domain\UserUpdatedAt;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class UserUpdatedAtType extends StringType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->getValue();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): UserUpdatedAt
    {
        return UserUpdatedAt::fromPrimitive($value);
    }
}
