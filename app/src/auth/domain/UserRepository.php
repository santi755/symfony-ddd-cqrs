<?php

namespace App\auth\domain;

use App\auth\domain\UserUuid;
use App\auth\domain\User;

interface UserRepository
{
    public function save(User $user): void;
    public function search(UserUuid $userId): ?User;
}
