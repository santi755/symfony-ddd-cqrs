<?php

namespace App\auth\infrastructure\controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\auth\infrastructure\controllers\request\RegisterUserRequest;

class RegisterUserController extends AbstractController
{
    #[Route('/auth/register', methods: ['POST'])]
    public function __invoke(RegisterUserRequest $registerUserRequest): JsonResponse
    {
        return new JsonResponse($registerUserRequest, JsonResponse::HTTP_CREATED);
    }
}
