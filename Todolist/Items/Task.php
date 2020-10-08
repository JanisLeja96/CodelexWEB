<?php


class Task
{
    private static int $count = 0;
    private int $id;
    private string $name;
    private string $description;

    public function __construct(string $name, string $description)
    {
        $this->id = ++Task::$count;
        $this->name = $name;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getID(): int
    {
        return $this->id;
    }
}