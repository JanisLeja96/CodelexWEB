<?php


class Picture
{

    private string $URL;
    private int $score;

    public function __construct(string $URL, int $score)
    {
        $this->URL = $URL;
        $this->score = $score;
    }

    public function like(): void
    {
        $this->score++;
    }

    public function dislike(): void
    {
        $this->score--;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getURL(): string
    {
        return $this->URL;
    }
}