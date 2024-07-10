<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Types;

use App\Auth\Domain\UserId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class UserIdType extends StringType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->getValue();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): UserId
    {
        return UserId::fromPrimitive($value);
    }
}
