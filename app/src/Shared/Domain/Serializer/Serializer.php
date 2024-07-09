<?php

namespace App\Shared\Domain\Serializer;

interface Serializer
{
    public function serialize($data): array;
    public function deserialize(array $data, string $class): mixed;
}
