<?php

namespace App\auth\infrastructure\repositories;

use App\auth\domain\User;
use App\auth\domain\UserUuid;

class DoctrineUserRepository
{
    public function save(User $user): void
    {
        echo 'Saving user';
    }

    public function search(UserUuid $userId): ?User
    {
        echo 'Searching user';

        return null;
    }
}
