<?php

namespace App\Auth\Infrastructure\Symfony\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Shared\Domain\Serializer;

use App\Auth\Infrastructure\Symfony\Controllers\Request\RegisterUserRequest;

use App\Auth\Domain\UserId;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Auth\Domain\UserDateTime;
use App\Auth\Domain\User;

class RegisterUserController extends AbstractController
{
    public function __construct(
        private Serializer $serializer
    ) {
    }

    #[Route('/auth/register', methods: ['POST'])]
    public function __invoke(RegisterUserRequest $userDTO): JsonResponse
    {
        $user = new User(
            UserId::generate(),
            $userDTO->name,
            UserEmail::fromPrimitive($userDTO->email),
            UserPassword::fromPrimitive($userDTO->password),
            UserDateTime::generate(),
            UserDateTime::generate(),
            null
        );

        $userSerialized = $this->serializer->serialize($user);

        return new JsonResponse($userSerialized, JsonResponse::HTTP_CREATED);
    }
}
