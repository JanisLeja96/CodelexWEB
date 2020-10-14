<?php


class User
{
    private string $username;
    private int $PIN;
    private int $ID;

    public function __construct(string $username, int $PIN, int $ID)
    {
        $this->username = $username;
        $this->PIN = $PIN;
        $this->ID = $ID;
    }

    public function getPIN(): int
    {
        return $this->PIN;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getID(): int
    {
        return $this->ID;
    }
}