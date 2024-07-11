<?php

namespace App\Auth\Infrastructure\Symfony\Controllers;

use App\Auth\Application\Command\RegisterUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Shared\Domain\Serializer\Serializer;

use App\Auth\Infrastructure\Symfony\Controllers\Request\RegisterUserRequest;
use App\Auth\Application\Command\RegisterUserCommandHandler;

class RegisterUserController extends AbstractController
{
    public function __construct(
        private Serializer $serializer,
        private RegisterUserCommandHandler $registerUserCommandHandler
    ) {
    }

    #[Route('/api/auth/register', methods: ['POST'])]
    public function __invoke(RegisterUserRequest $userDTO): JsonResponse
    {
        $user = [
            "name" => $userDTO->name,
            "email" => $userDTO->email,
            "password" => $userDTO->password
        ];

        $registerUserCommand = $this->serializer->deserialize($user, RegisterUserCommand::class);
        $this->registerUserCommandHandler->__invoke($registerUserCommand);

        return new JsonResponse('Doing...', JsonResponse::HTTP_CREATED);
    }
}
