<?php

namespace App\Auth\Domain;

use App\Auth\Domain\UserEmail;
use App\Auth\Domain\User;

interface UserRepository
{
    public function save(User $user): void;
    public function find(UserEmail $userEmail): ?User;
    public function findOneBy(array $criteria): ?User;
    public function findAll(): array;
}
