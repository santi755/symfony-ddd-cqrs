<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Types;

use App\Auth\Domain\UserRoles;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\JsonType;

final class UserRolesType extends JsonType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->__toString();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): UserRoles
    {
        return UserRoles::generate(json_decode($value, true));
    }
}
