<?php

namespace App\Auth\Infrastructure\Repositories;

use App\Auth\Domain\User;
use App\Auth\Domain\UserId;

class DoctrineUserRepository
{
    public function save(User $user): void
    {
        echo 'Saving user';
    }

    public function search(UserId $userId): ?User
    {
        echo 'Searching user';

        return null;
    }
}
