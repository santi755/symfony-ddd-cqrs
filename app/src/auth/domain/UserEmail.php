<?php

namespace App\auth\domain;

use App\shared\domain\Email;

class UserEmail
{
    private function __construct(private Email $email)
    {
    }

    public static function fromPrimitive(string $emailString): self
    {
        $email = Email::fromPrimitive($emailString);
        return new self($email);
    }

    public function getValue(): string
    {
        return $this->email->getValue();
    }

    public function equals(self $other): bool
    {
        return $this->email->equals($other->email);
    }
}
