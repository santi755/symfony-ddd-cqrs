<?php

namespace App\Auth\Application\Command;

use App\Auth\Application\Command\LoginUserCommand;
use App\Auth\Domain\UserEmail;
use App\Shared\Domain\Serializer\Serializer;
use App\Auth\Domain\UserRepository;

class LoginUserCommandHandler
{
    public function __construct(
        private Serializer $serializer,
        private UserRepository $userRepository
    ) {}

    public function __invoke(LoginUserCommand $command): array
    {
        $user = $this->serializer->serialize($command);
        $userEmail = UserEmail::fromPrimitive($user['email']);

        $userRegistered = $this->userRepository->findOneBy([
            'email' => $userEmail
        ]);

        if (!$userRegistered) {
            throw new \InvalidArgumentException('User not found.');
        }

        $userRegisteredSerialized = $this->serializer->serialize($userRegistered);

        return $userRegisteredSerialized;
    }
}
