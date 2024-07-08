<?php

namespace App\auth\domain;

use App\auth\domain\UserId;
use App\auth\domain\User;

interface UserRepository
{
    public function save(User $user): void;
    public function search(UserId $userId): ?User;
}
