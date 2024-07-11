<?php

namespace App\Auth\Infrastructure\Symfony\Security;

use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserRepository;
use App\Shared\Domain\Serializer\Serializer;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

final class UserProvider implements UserProviderInterface
{
    public function __construct(
        private UserRepository $userRepository,
        private Serializer $serializer
    ) {
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $this->loadUserByIdentifier($user->getUserIdentifier());
    }

    public function supportsClass(string $class): bool
    {
        return Auth::class === $class;
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $userEmail = UserEmail::fromPrimitive($identifier);
        $user = $this->userRepository->findOneBy(
            ['email' => $userEmail]
        );

        if (!$user) {
            throw new UserNotFoundException();
        }

        $userSerialized = $this->serializer->serialize($user);

        return new Auth($identifier, $userSerialized['password']['value']);
    }
}
