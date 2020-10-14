<?php


class User
{
    private string $username;
    private int $PIN;

    public function __construct(string $username, int $PIN)
    {
        $this->username = $username;
        $this->PIN = $PIN;
    }

    public function getPIN(): int
    {
        return $this->PIN;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}