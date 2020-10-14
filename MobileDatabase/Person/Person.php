<?php

class Person
{
    private string $firstName;
    private string $lastName;
    private int $phoneNumber;

    public function __construct(string $firstName, string $lastName, int $phoneNumber)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }
}