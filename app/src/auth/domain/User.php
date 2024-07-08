<?php

namespace App\auth\domain;

use App\auth\domain\UserId;

class User
{
    public function __construct(
        private UserId $id,
        private string $name,
        private string $email,
        private string $password,
    ) {
    }
}
