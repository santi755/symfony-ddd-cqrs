<?php

namespace App\Auth\Infrastructure\Symfony\Controllers\Request;

use App\Shared\Infrastructure\Symfony\Controllers\Request\AbstractJsonRequest;
use Symfony\Component\Validator\Constraints as Assert;

class RegisterUserRequest extends AbstractJsonRequest
{

    #[Assert\NotBlank()]
    #[Assert\Type('string')]
    public readonly string $name;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public readonly string $email;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public readonly string $password;
}
