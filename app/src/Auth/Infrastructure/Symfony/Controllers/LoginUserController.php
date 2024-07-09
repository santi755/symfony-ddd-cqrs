<?php

namespace App\Auth\Infrastructure\Symfony\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LoginUserController extends AbstractController
{
    #[Route('/auth/login', methods: ['POST'], name: 'login')]
    public function execute(): JsonResponse
    {
        return new JsonResponse(['message' => 'Login']);
    }
}
