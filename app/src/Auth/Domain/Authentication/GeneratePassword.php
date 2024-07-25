<?php

namespace App\Auth\Domain\Authentication;

use App\Auth\Domain\User;

interface GeneratePassword
{
    public function generate(User $user, string $password): string;
}
