<?php

namespace App\Auth\Application\Command;

use App\Auth\Application\Command\RegisterUserCommand;
use App\Auth\Domain\User;
use App\Auth\Domain\UserCreatedAt;
use App\Auth\Domain\UserUpdatedAt;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserId;
use App\Auth\Domain\UserPassword;
use App\Shared\Domain\Serializer\Serializer;
use App\Auth\Domain\UserRepository;
use App\Auth\Domain\Authentication\GeneratePassword;

class RegisterUserCommandHandler
{
    public function __construct(
        private Serializer $serializer,
        private UserRepository $userRepository,
        private GeneratePassword $generatePassword
    ) {
    }

    public function __invoke(RegisterUserCommand $command): void
    {
        $userSerialized = $this->serializer->serialize($command);

        $user = new User(
            UserId::generate(),
            $userSerialized['name'],
            UserEmail::fromPrimitive($userSerialized['email']),
            UserPassword::generate($userSerialized['password']),
            UserCreatedAt::generate(),
            UserUpdatedAt::generate(),
            null
        );

        $encodedPassword = $this->generatePassword->generate($user, $userSerialized['password']);
        $user->updatePassword(UserPassword::generate($encodedPassword));

        // TODO: Check is the user already exists (by email)
        $this->userRepository->save($user);
    }
}
