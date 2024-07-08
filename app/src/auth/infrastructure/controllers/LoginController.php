<?php

namespace App\auth\infrastructure\controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', methods: ['GET'], name: 'login')]
    public function execute(): JsonResponse
    {
        return new JsonResponse(['message' => 'Login']);
    }
}
