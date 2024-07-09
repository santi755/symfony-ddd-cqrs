<?php

namespace App\Shared\Infrastructure\Symfony\Serializer;

use App\Shared\Domain\Serializer\Serializer;
use JMS\Serializer\ArrayTransformerInterface;

class JMSSerializer implements Serializer
{
    public function __construct(
        private ArrayTransformerInterface $serializer
    ) {
    }

    public function serialize($data): array
    {
        return $this->serializer->toArray($data);
    }

    public function deserialize(array $data, string $class): mixed
    {
        return $this->serializer->fromArray($data, $class);
    }
}
