<?php

namespace App\Auth\Domain;

use App\Auth\Domain\UserId;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Auth\Domain\UserCreatedAt;
use App\Auth\Domain\UserUpdatedAt;
use App\Auth\Domain\UserDeletedAt;
use App\Auth\Domain\UserRoles;

class User
{
    public function __construct(
        private UserId $id,
        private string $name,
        private UserEmail $email,
        private UserPassword $password,
        private UserCreatedAt $createdAt,
        private UserUpdatedAt $updatedAt,
        private ?UserDeletedAt $deletedAt,
        private UserRoles $roles
    ) {}

    public function changePassword(UserPassword $password): void
    {
        $this->password = $password;
    }
}
