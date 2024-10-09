<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Repositories;

use App\Auth\Domain\User;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\Repository\DoctrineRepository;

class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    public function save(User $user): void
    {
        $this->persist($user);
        $this->entityManager()->flush();
    }

    public function find(UserEmail $userEmail): ?User
    {
        return $this->repository(User::class)->findOneBy(['email' => $userEmail]);
    }

    public function findOneBy(array $criteria): ?User
    {
        return $this->repository(User::class)->findOneBy($criteria);
    }

    public function findAll(): array
    {
        return $this->repository(User::class)->findAll();
    }
}
