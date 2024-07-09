<?php

namespace App\Shared\Domain;

interface Serializer
{
    public function serialize($data): array;
    public function deserialize(array $data, string $class): mixed;
}
