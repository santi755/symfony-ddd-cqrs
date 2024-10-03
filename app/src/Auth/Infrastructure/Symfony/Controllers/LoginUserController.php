<?php

namespace App\Auth\Infrastructure\Symfony\Controllers;

use App\Auth\Application\Command\LoginUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Shared\Domain\Serializer\Serializer;

use App\Auth\Infrastructure\Symfony\Controllers\Request\LoginUserRequest;
use App\Auth\Application\Command\LoginUserCommandHandler;

class LoginUserController extends AbstractController
{
    public function __construct(
        private Serializer $serializer,
        private LoginUserCommandHandler $loginUserCommandHandler
    ) {}

    #[Route('/api/auth/login', methods: ['POST'], name: 'login')]
    public function __invoke(LoginUserRequest $userDTO): JsonResponse
    {
        $user = [
            "email" => $userDTO->email,
            "password" => $userDTO->password
        ];

        $loginUserCommand = $this->serializer->deserialize($user, LoginUserCommand::class);
        $userLogged = $this->loginUserCommandHandler->__invoke($loginUserCommand);

        return new JsonResponse($userLogged, JsonResponse::HTTP_OK);
    }
}
