<?php

namespace App\auth\infrastructure\repositories;

use App\auth\domain\User;
use App\auth\domain\UserId;

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
