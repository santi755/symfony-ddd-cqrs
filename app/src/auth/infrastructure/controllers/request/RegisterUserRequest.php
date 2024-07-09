<?php

namespace App\auth\infrastructure\controllers\request;

use App\shared\infrastructure\controllers\request\AbstractJsonRequest;
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
