<?php

namespace App;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Person
{
    private string $name;
    private UuidInterface $uuid;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->uuid = UUID::uuid4();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUUID(): string
    {
        return $this->uuid->toString();
    }
}