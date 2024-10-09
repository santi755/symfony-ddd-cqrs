<?php

namespace App\Auth\Infrastructure\Symfony\Security;

use App\Auth\Domain\User;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

final class CurrentUserProvider
{
    private ?User $currentUser = null;

    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly UserRepository        $userRepository,
    ) {}

    public function get(): ?User
    {
        if (!$this->currentUser) {
            $this->currentUser = $this->fromToken($this->tokenStorage->getToken());
        }

        return $this->currentUser;
    }

    public function fromToken(?TokenInterface $token): ?User
    {
        if (!$token || !$token->getUser() instanceof Auth) {
            return null;
        }

        $user = $token->getUser();
        $userEmail = UserEmail::fromPrimitive($user->getUserIdentifier());

        return $this->userRepository->find($userEmail);
    }
}
