<?php

namespace App\Auth\Domain;

use App\Auth\Domain\UserId;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Auth\Domain\UserCreatedAt;
use App\Auth\Domain\UserUpdatedAt;
use App\Auth\Domain\UserDeletedAt;

class User
{
    public function __construct(
        private UserId $id,
        private string $name,
        private UserEmail $email,
        private UserPassword $password,
        private UserCreatedAt $createdAt,
        private UserUpdatedAt $updatedAt,
        private ?UserDeletedAt $deletedAt
    ) {
    }
}
