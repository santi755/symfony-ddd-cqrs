<?php

namespace App\auth\infrastructure\controllers;

use App\auth\infrastructure\controllers\dto\UserDTO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController
{
    #[Route('/auth/register', methods: ['POST'], format: 'json')]
    public function __invoke(
        #[MapRequestPayload] UserDTO $userDTO
    ): JsonResponse {
        return new JsonResponse(['$userDTO' => 'asd']);
    }
}
