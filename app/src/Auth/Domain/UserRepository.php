<?php

namespace App\Auth\Domain;

use App\Auth\Domain\UserId;
use App\Auth\Domain\User;

interface UserRepository
{
    public function save(User $user): void;
    public function find(UserId $userId): ?User;
    public function findAll(): array;
}
