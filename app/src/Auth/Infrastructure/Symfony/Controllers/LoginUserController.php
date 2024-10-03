<?php

namespace App\Auth\Infrastructure\Symfony\Controllers;

use App\Auth\Application\Command\LoginUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Shared\Domain\Serializer\Serializer;

use App\Auth\Infrastructure\Symfony\Controllers\Request\LoginUserRequest;
use App\Auth\Application\Command\LoginUserCommandHandler;
use App\Auth\Domain\User;
use Symfony\Bundle\SecurityBundle\Security;

class LoginUserController extends AbstractController
{
    public function __construct(
        private Serializer $serializer,
        private LoginUserCommandHandler $loginUserCommandHandler,
        private Security $security
    ) {}

    #[Route('/api/auth/me', methods: ['GET'], name: 'me')]
    public function __invoke(): JsonResponse
    {
        $user = $this->security->getUser();

        if (!$user) {
            return new JsonResponse(['error' => 'Unauthorized'], 401);
        }

        $userSerialized = $this->serializer->serialize($user, User::class);

        return new JsonResponse($userSerialized, JsonResponse::HTTP_OK);
    }

    /*
        #[Route('/api/auth/me', methods: ['GET'], name: 'me')]
    public function __invoke(): JsonResponse
    {
        $user = [
            "email" => $userDTO->email,
            "password" => $userDTO->password
        ];

        $loginUserCommand = $this->serializer->deserialize($user, LoginUserCommand::class);
        $userLogged = $this->loginUserCommandHandler->__invoke($loginUserCommand);

        return new JsonResponse($userLogged, JsonResponse::HTTP_OK);
    }
    */
}
