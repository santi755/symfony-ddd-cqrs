<?php

namespace App\Auth\Infrastructure\Symfony\Http\Get;

use App\Auth\Domain\User;
use App\Auth\Infrastructure\Symfony\Security\CurrentUserProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Shared\Domain\Serializer\Serializer;
use Symfony\Bundle\SecurityBundle\Security;

class UserProfileController extends AbstractController
{
    public function __construct(
        private Serializer $serializer,
        private Security $security
    ) {}

    #[Route('/api/auth/me', methods: ['GET'], name: 'me')]
    public function __invoke(CurrentUserProvider $userProvider): JsonResponse
    {
        $user = $userProvider->get();

        if (!$user) {
            return new JsonResponse(['error' => 'Unauthorized'], 401);
        }

        $userSerialized = $this->serializer->serialize($user, User::class);

        return new JsonResponse($userSerialized, JsonResponse::HTTP_OK);
    }
}
