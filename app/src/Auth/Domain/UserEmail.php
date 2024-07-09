<?php

namespace App\Auth\Domain;

use App\Shared\Domain\Email;

class UserEmail
{
    private function __construct(private Email $email)
    {
    }

    public static function fromPrimitive(string $emailString): UserEmail
    {
        $email = Email::fromPrimitive($emailString);

        return new UserEmail($email);
    }

    public function getValue(): string
    {
        return $this->email->getValue();
    }

    public function equals(UserEmail $other): bool
    {
        return $this->email->equals($other->email);
    }
}
