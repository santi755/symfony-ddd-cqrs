<?php

namespace App\auth\infrastructure\controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\auth\infrastructure\controllers\request\RegisterUserRequest;

use App\auth\domain\UserId;
use App\auth\domain\UserEmail;
use App\auth\domain\UserPassword;
use App\auth\domain\UserDateTime;
use App\auth\domain\User;

class RegisterUserController extends AbstractController
{
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

        return new JsonResponse($user, JsonResponse::HTTP_CREATED);
    }
}
