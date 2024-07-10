<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Types;

use App\Auth\Domain\UserPassword;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class UserPasswordType extends StringType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->getValue();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): UserPassword
    {
        return UserPassword::fromPrimitive($value);
    }
}
