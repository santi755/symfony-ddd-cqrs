<?php

namespace App\auth\infrastructure\controllers\request;

use App\shared\infrastructure\controllers\request\AbstractJsonRequest;
use Symfony\Component\Validator\Constraints as Assert;

class RegisterUserRequest extends AbstractJsonRequest
{

    #[Assert\NotBlank()]
    #[Assert\Type('string')]
    public readonly string $firstName;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public readonly string $lastName;

    #[Assert\GreaterThan(18)]
    #[Assert\Type('int')]
    public readonly int $age;
}
