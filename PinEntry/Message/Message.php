<?php


class Message
{
    private string $message;
    private int $userID;

    public function __construct(int $userID, string $message)
    {
        $this->message = $message;
        $this->userID = $userID;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getUserID(): int
    {
        return $this->userID;
    }
}