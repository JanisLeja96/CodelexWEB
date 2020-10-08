<?php


class Person
{
    private string $name;
    private string $lastName;
    private string $personalCode;
    private string $address;

    public function __construct(string $name, string $lastName, string $personalCode, string $address)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->personalCode = $personalCode;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPersonalCode(): string
    {
        return $this->personalCode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function __toString(): string
    {
        return "{$this->name} {$this->lastName} {$this->personalCode} {$this->address}";
    }

}