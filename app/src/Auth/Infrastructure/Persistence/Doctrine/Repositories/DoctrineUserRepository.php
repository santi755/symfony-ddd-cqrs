<?php

namespace App\Auth\Infrastructure\Persistence\Doctrine\Repositories;

use App\Auth\Infrastructure\Persistence\Doctrine\Entities\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineUserRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry
    ) {
        parent::__construct($registry, User::class);
    }

    public function save(): void
    {
        echo 'Saving user';
    }

    public function search(): ?User
    {
        echo 'Searching user';

        return null;
    }
}
