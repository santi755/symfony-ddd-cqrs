<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure\Symfony\Security;


use App\Auth\Domain\User;
use App\Auth\Domain\Authentication\GeneratePassword;
use App\Shared\Domain\Serializer\Serializer;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class EncodedPassword implements GeneratePassword
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
        private Serializer $serializer
    ) {
    }

    public function generate(User $user, string $password): string
    {
        $userSerialized = $this->serializer->serialize($user);
        $authUser = new Auth($userSerialized['email']['value'], $password);
        return $this->passwordHasher->hashPassword($authUser, $password);
    }
}
