<?php

namespace App\Auth\Domain;

use App\Auth\Domain\UserId;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Auth\Domain\UserDateTime;

class User
{
    public function __construct(
        private UserId $id,
        private string $name,
        private UserEmail $email,
        private UserPassword $password,
        private UserDateTime $createdAt,
        private UserDateTime $updatedAt,
        private ?UserDateTime $deletedAt
    ) {
    }
}
