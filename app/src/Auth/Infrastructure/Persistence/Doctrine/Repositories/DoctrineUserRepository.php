<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Repositories;

use App\Auth\Domain\User;
use App\Auth\Domain\UserId;
use App\Auth\Domain\UserRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\Repository\DoctrineRepository;

class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    public function save(User $user): void
    {
        $this->persist($user);
    }

    public function find(UserId $userId): ?User
    {
        return $this->repository(User::class)->find($userId);
    }
}
