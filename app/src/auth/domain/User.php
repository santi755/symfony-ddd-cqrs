<?php

namespace App\auth\domain;

use App\auth\domain\UserId;
use App\auth\domain\UserEmail;
use App\auth\domain\UserPassword;
use App\auth\domain\UserDateTime;

class User
{
    public function __construct(
        public UserId $id,
        public string $name,
        public UserEmail $email,
        public UserPassword $password,
        public UserDateTime $createdAt,
        public UserDateTime $updatedAt,
        public ?UserDateTime $deletedAt
    ) {
    }
}
