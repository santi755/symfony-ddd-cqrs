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

class RegisterUserCommandHandler
{
    public function __construct(
        private Serializer $serializer
    ) {
    }

    public function __invoke(RegisterUserCommand $command): void
    {
        $user = $this->serializer->serialize($command);

        $user = new User(
            UserId::generate(),
            $user['name'],
            UserEmail::fromPrimitive($user['email']),
            UserPassword::fromPrimitive($user['password']),
            UserCreatedAt::generate(),
            UserUpdatedAt::generate(),
            null
        );

        var_dump($user);
        die();
    }
}
